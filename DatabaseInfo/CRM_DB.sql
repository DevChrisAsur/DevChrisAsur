CREATE TABLE "Cliente" (
  "ID_Cliente" int PRIMARY KEY,
  "identificacion" int,
  "Nombres" varchar,
  "apellidos" varchar,
  /*persona natural o empresa*/
  "Tipo" varchar,
  /*solo si es empresa*/
  "Cantidad_Empleados" int,
  /*solo si es empresa*/
  "Anos_Experiencia" int,
  "Email" varchar,
  "Telefono" varchar
);


/*lista de servicios 
para personas:
  personas plus
  personas star
  extrangeria
para empresas:
  empresas plus
  empresas star
*/
CREATE TABLE "Servicio" (
  "ID_Servicio" int PRIMARY KEY,
  "Nombre_Servicio" varchar,
  "Costo_Anual" decimal,
  "Numero_Personas_Cubiertas" int 
);

/*lista de areas:
  administrativo
  civil
  penal 
  familia
 */
CREATE TABLE "AreaDerecho" (
  "ID_Area" int PRIMARY KEY,
  "Nombre_Area" varchar
);

CREATE TABLE "Suscripcion" (
  "ID_Suscripcion" int PRIMARY KEY,
  "Fecha_Inicio" date,
  "Fecha_Fin" date,
  "ID_Cliente" int,
  "ID_Servicio" int
);

CREATE TABLE "Cobertura" (
  "ID_Cobertura" int PRIMARY KEY,
  "ID_Servicio" int,
  "ID_Area" int
);

CREATE TABLE "Usuario" (
  "ID_Usuario" int PRIMARY KEY,
  "Nombre_Usuario" varchar,
  "Rol" varchar,
  "identificacion" int,
  "Nombres" varchar,
  "apellidos" varchar,
  "Email" varchar,
  "Telefono" varchar,
  "Contrasena" varchar,
  "Fecha_Creacion" date,
  "Fecha_Modificacion" date
);
 /*generacion de un caso de estudio*/
CREATE TABLE "CasoLegal" (
  "ID_Caso" int PRIMARY KEY,
  "ID_Cliente" int,
  "ID_Area" int,
  "Descripcion" varchar,
  "Fecha_Apertura" date,
  "Fecha_Cierre" date,
  "Estado" varchar,
  "ID_Usuario" int
);

/*objetivos a seguir del caso*/
CREATE TABLE "Tarea" (
  "ID_Tarea" int PRIMARY KEY,
  "ID_Caso" int,
  "Descripcion" varchar,
  "Fecha_Limite" date,
  "Estado" varchar,
  "ID_Usuario" int
);

CREATE TABLE "HistorialComunicacion" (
  "ID_Historial" int PRIMARY KEY,
  "ID_Cliente" int,
  "ID_Usuario" int,
  "Fecha" date,
  "Tipo_Comunicacion" varchar,
  "Descripcion" varchar
);
/*documentos adjuntos*/
CREATE TABLE "Documento" (
  "ID_Documento" int PRIMARY KEY,
  "ID_Caso" int,
  "Nombre_Documento" varchar,
  "Ruta_Archivo" varchar,
  "Fecha_Subida" date,
  /*identificador para cliente o usuario*/
  "Subido_Por" int
);

CREATE TABLE "Factura" (
  "ID_Factura" int PRIMARY KEY,
  "ID_Cliente" int,
  "ID_Suscripcion" int,
  "Monto" decimal,
  "Fecha_Emision" date,
  "Estado_Pago" varchar
);

CREATE TABLE "Contacto" ( 
  "ID_Contacto" int PRIMARY KEY,
  "ID_Cliente" int,
  "Nombre" varchar,
  "Email" varchar,
  "Telefono" varchar,
  "Posicion" varchar,
  "Notas" varchar
);

ALTER TABLE "Suscripcion" ADD FOREIGN KEY ("ID_Cliente") REFERENCES "Cliente" ("ID_Cliente");

ALTER TABLE "Suscripcion" ADD FOREIGN KEY ("ID_Servicio") REFERENCES "Servicio" ("ID_Servicio");

ALTER TABLE "Cobertura" ADD FOREIGN KEY ("ID_Servicio") REFERENCES "Servicio" ("ID_Servicio");

ALTER TABLE "Cobertura" ADD FOREIGN KEY ("ID_Area") REFERENCES "AreaDerecho" ("ID_Area");

ALTER TABLE "CasoLegal" ADD FOREIGN KEY ("ID_Cliente") REFERENCES "Cliente" ("ID_Cliente");

ALTER TABLE "CasoLegal" ADD FOREIGN KEY ("ID_Area") REFERENCES "AreaDerecho" ("ID_Area");

ALTER TABLE "CasoLegal" ADD FOREIGN KEY ("ID_Usuario") REFERENCES "Usuario" ("ID_Usuario");

ALTER TABLE "Tarea" ADD FOREIGN KEY ("ID_Caso") REFERENCES "CasoLegal" ("ID_Caso");

ALTER TABLE "Tarea" ADD FOREIGN KEY ("ID_Usuario") REFERENCES "Usuario" ("ID_Usuario");

ALTER TABLE "HistorialComunicacion" ADD FOREIGN KEY ("ID_Cliente") REFERENCES "Cliente" ("ID_Cliente");

ALTER TABLE "HistorialComunicacion" ADD FOREIGN KEY ("ID_Usuario") REFERENCES "Usuario" ("ID_Usuario");

ALTER TABLE "Documento" ADD FOREIGN KEY ("ID_Caso") REFERENCES "CasoLegal" ("ID_Caso");

ALTER TABLE "Documento" ADD FOREIGN KEY ("Subido_Por") REFERENCES "Usuario" ("ID_Usuario");

ALTER TABLE "Factura" ADD FOREIGN KEY ("ID_Cliente") REFERENCES "Cliente" ("ID_Cliente");

ALTER TABLE "Factura" ADD FOREIGN KEY ("ID_Suscripcion") REFERENCES "Suscripcion" ("ID_Suscripcion");

ALTER TABLE "Contacto" ADD FOREIGN KEY ("ID_Cliente") REFERENCES "Cliente" ("ID_Cliente");
