CREATE SEQUENCE american_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 START 1;

CREATE TABLE "public"."american" (
    "id" integer DEFAULT nextval('american_id_seq') NOT NULL,
    "name" text NOT NULL,
    "mes" integer NOT NULL,
    "dia" integer NOT NULL
) WITH (oids = false);
