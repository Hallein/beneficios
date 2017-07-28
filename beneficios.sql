/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     27-07-2017 20:48:31                          */
/*==============================================================*/


drop table if exists BENEFICIO;

drop table if exists ETAPA;

drop table if exists ETAPA_BENEFICIO;

drop table if exists HITO;

drop table if exists HITO_BENEFICIO;

drop table if exists PERSONA;

drop table if exists TIPO_BENEFICIO;

drop table if exists USUARIO;

/*==============================================================*/
/* Table: BENEFICIO                                             */
/*==============================================================*/
create table BENEFICIO
(
   BEN_ID               int not null auto_increment,
   TIPBEN_ID            int not null,
   PER_RUT              int not null,
   BEN_EMPRESA          varchar(100) not null,
   BEN_ESTADO           smallint not null,
   primary key (BEN_ID)
);

/*==============================================================*/
/* Table: ETAPA                                                 */
/*==============================================================*/
create table ETAPA
(
   ETA_ID               int not null auto_increment,
   ETA_NOMBRE           varchar(100) not null,
   ETA_DETALLE          varchar(1000),
   primary key (ETA_ID)
);

/*==============================================================*/
/* Table: ETAPA_BENEFICIO                                       */
/*==============================================================*/
create table ETAPA_BENEFICIO
(
   ETA_ID               int not null,
   BEN_ID               int not null,
   EB_FECHAINI          datetime,
   EB_FECHAFIN          datetime,
   EB_ESTADO            smallint,
   primary key (ETA_ID, BEN_ID)
);

/*==============================================================*/
/* Table: HITO                                                  */
/*==============================================================*/
create table HITO
(
   HITO_ID              int not null auto_increment,
   ETA_ID               int not null,
   HITO_NOMBRE          varchar(100) not null,
   HITO_ESTADO          smallint not null,
   primary key (HITO_ID)
);

/*==============================================================*/
/* Table: HITO_BENEFICIO                                        */
/*==============================================================*/
create table HITO_BENEFICIO
(
   HITO_ID              int not null,
   US_RUT               int not null,
   BEN_ID               int not null,
   HB_FECHA             datetime,
   HB_DETALLE           varchar(1000),
   primary key (HITO_ID, US_RUT, BEN_ID)
);

/*==============================================================*/
/* Table: PERSONA                                               */
/*==============================================================*/
create table PERSONA
(
   PER_RUT              int not null,
   PER_NOMBRE           varchar(100) not null,
   primary key (PER_RUT)
);

/*==============================================================*/
/* Table: TIPO_BENEFICIO                                        */
/*==============================================================*/
create table TIPO_BENEFICIO
(
   TIPBEN_ID            int not null auto_increment,
   TIPBEN_NOMBRE        varchar(50) not null,
   primary key (TIPBEN_ID)
);

/*==============================================================*/
/* Table: USUARIO                                               */
/*==============================================================*/
create table USUARIO
(
   US_RUT               int not null,
   US_NOMBRE            varchar(100) not null,
   US_CLAVE             varchar(60) not null,
   primary key (US_RUT)
);

alter table BENEFICIO add constraint FK_RELATIONSHIP_1 foreign key (PER_RUT)
      references PERSONA (PER_RUT) on delete restrict on update restrict;

alter table BENEFICIO add constraint FK_RELATIONSHIP_2 foreign key (TIPBEN_ID)
      references TIPO_BENEFICIO (TIPBEN_ID) on delete restrict on update restrict;

alter table ETAPA_BENEFICIO add constraint FK_ETAPA_BENEFICIO foreign key (ETA_ID)
      references ETAPA (ETA_ID) on delete restrict on update restrict;

alter table ETAPA_BENEFICIO add constraint FK_ETAPA_BENEFICIO2 foreign key (BEN_ID)
      references BENEFICIO (BEN_ID) on delete restrict on update restrict;

alter table HITO add constraint FK_RELATIONSHIP_4 foreign key (ETA_ID)
      references ETAPA (ETA_ID) on delete restrict on update restrict;

alter table HITO_BENEFICIO add constraint FK_HITO_BENEFICIO foreign key (HITO_ID)
      references HITO (HITO_ID) on delete restrict on update restrict;

alter table HITO_BENEFICIO add constraint FK_HITO_BENEFICIO2 foreign key (US_RUT)
      references USUARIO (US_RUT) on delete restrict on update restrict;

alter table HITO_BENEFICIO add constraint FK_HITO_BENEFICIO3 foreign key (BEN_ID)
      references BENEFICIO (BEN_ID) on delete restrict on update restrict;

