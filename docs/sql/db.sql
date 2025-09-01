create schema to_do_list;

create table to_do_list.user
(
    id          int(11) unsigned auto_increment,
    name        varchar(55)              not null,
    email       varchar(255)             not null,
    password    varchar(255)              not null,
    active      tinyint(1) default 0     not null,
    created_at  datetime   default now() not null,
    updated_at   datetime   default now() not null,
    deleted_at datetime                 null,
    constraint user_pk
        primary key (id)
);

alter table user
    add unique (email);

create table to_do_list.task
(
    id          int unsigned auto_increment,
    user_id     int(11) unsigned         not null comment 'Usuário que criou a tarefa',
    title       varchar(55)              not null,
    description text                     not null,
    status      tinyint(1) default 1     not null,
    created_at  datetime   default now() not null,
    updated_at   datetime   default now() not null,
    deleted_at datetime                 null,
    constraint tasks_pk
        primary key (id)
);

alter table task
    add constraint task_fk_user
        foreign key (user_id) references user (id);

create table tag
(
    id          int(11) unsigned auto_increment
        primary key,
    name        varchar(55)  not null,
    description varchar(255) not null
);

create table task_tag
(
    id      int(11) unsigned auto_increment
        primary key,
    task_id int(11) unsigned not null,
    tag_id  int(11) unsigned not null,
    constraint task_tag___fk_tag_id
        foreign key (tag_id) references tag (id)
            on update cascade on delete cascade,
    constraint task_tag___fk_task_id
        foreign key (task_id) references task (id)
            on update cascade on delete cascade
);

create table task_status
(
    id          int(11) unsigned auto_increment
        primary key,
    name        varchar(55) not null,
    description varchar(255) not null
);

create table task_history
(
    id             int(11) unsigned auto_increment
        primary key,
    user_id        int(11) unsigned       not null,
    task_id        int(11) unsigned       not null,
    task_status_id int(11) unsigned       not null,
    created_at     datetime default now() not null,
    constraint task_history___fk_task_id
        foreign key (task_id) references task (id)
            on update cascade on delete cascade,
    constraint task_history___fk_task_status_id
        foreign key (task_status_id) references task_status (id),
    constraint task_history___fk_user_id
        foreign key (user_id) references user (id)
);

create table task_comment
(
    id         int(11) unsigned auto_increment
        primary key,
    user_id    int(11) unsigned       not null,
    task_id    int(11) unsigned       not null,
    comment    longtext               not null,
    created_at datetime default now() not null,
    constraint task_comment___fk_task_id
        foreign key (task_id) references task (id),
    constraint task_comment___fk_user_id
        foreign key (user_id) references user (id)
);



INSERT INTO to_do_list.tag (name, description)
VALUES ('Bug', 'Tag para tarefas de bugs');

INSERT INTO to_do_list.tag (name, description)
VALUES ('Feature', 'Tag para tarefas de novos recursos');

INSERT INTO to_do_list.tag (name, description)
VALUES ('Correction', 'Tag para tarefas de correções');

INSERT INTO to_do_list.tag (name, description)
VALUES ('Analysis', 'Tag para tarefas de analises');

INSERT INTO to_do_list.tag (name, description)
VALUES ('Inprovement', 'Tag para tarefas de melhoria');

INSERT INTO to_do_list.task_status (name, description)
VALUES ('To-do', 'Tarefas que estão aguardando para serem iniciadas.');

INSERT INTO to_do_list.task_status (name, description)
VALUES ('Doing', 'Tarefa em andamento.');

INSERT INTO to_do_list.task_status (name, description)
VALUES ('Done', 'Tarefa feita.');
