Table Cliente {
  ID_Cliente int [pk]
  cc varchar
  Nombre varchar
  apellido varchar
  Tipo varchar
  Cantidad_Empleados int
  Años_Experiencia int
  Email varchar
  Teléfono varchar
  ID_Lead int [ref: > Lead.ID_Lead]
}

Table Lead {
  ID_Lead int [pk]
  Nombre varchar
  Apellido varchar
  Email varchar
  Teléfono varchar
  Estado varchar
  Fecha_Creación date
  Origen varchar
  Notas text
  ID_Servicio int [ref: > Servicio.ID_Servicio]
  ID_Area int [ref: > AreaDerecho.ID_Area]
}

Table Servicio {
  ID_Servicio int [pk]
  Nombre_Servicio varchar
  Costo_Anual decimal
  Número_Personas_Cubiertas int
}

Table AreaDerecho {
  ID_Area int [pk]
  Nombre_Area varchar
}

Table Suscripcion {
  ID_Suscripción int [pk]
  Fecha_Inicio date
  Fecha_Fin date
  ID_Cliente int [ref: > Cliente.ID_Cliente]
  ID_Servicio int [ref: > Servicio.ID_Servicio]
}

Table Cobertura {
  ID_Cobertura int [pk]
  ID_Servicio int [ref: > Servicio.ID_Servicio]
  ID_Area int [ref: > AreaDerecho.ID_Area]
}

Table Usuario {
  ID_Usuario int [pk]
  user_status bool
  cc varchar
  first_name varchar
  last_name varchar
  user_name varchar
  Rol varchar
  Perfil varchar
  area varchar
  Email varchar
  Teléfono varchar
  Contraseña varchar
}

Table CasoLegal {
  ID_Caso int [pk]
  ID_Cliente int [ref: > Cliente.ID_Cliente]
  ID_Area int [ref: > AreaDerecho.ID_Area]
  Descripción varchar
  Fecha_Apertura date
  Fecha_Cierre date
  Estado varchar
  ID_Usuario int [ref: > Usuario.ID_Usuario]
}

Table Tarea {
  ID_Tarea int [pk]
  ID_Caso int [ref: > CasoLegal.ID_Caso]
  Descripción varchar
  Fecha_Límite date
  Estado varchar
  ID_Usuario int [ref: > Usuario.ID_Usuario]
}

Table HistorialComunicacion {
  ID_Historial int [pk]
  ID_Lead int [ref: > Lead.ID_Lead]
  ID_Cliente int [ref: > Cliente.ID_Cliente]
  ID_Usuario int [ref: > Usuario.ID_Usuario]
  Fecha date
  Tipo_Comunicación varchar
  Descripción varchar
}

Table Documento {
  ID_Documento int [pk]
  ID_Caso int [ref: > CasoLegal.ID_Caso]
  Nombre_Documento varchar
  Ruta_Archivo varchar
  Fecha_Subida date
  Subido_Por int [ref: > Usuario.ID_Usuario]
}

Table Factura {
  ID_Factura int [pk]
  ID_Cliente int [ref: > Cliente.ID_Cliente]
  ID_Suscripción int [ref: > Suscripcion.ID_Suscripción]
  Monto decimal
  Fecha_Emisión date
  Estado_Pago varchar
}

Table Contacto {
  ID_Contacto int [pk]
  ID_Cliente int [ref: > Cliente.ID_Cliente]
  Nombre varchar
  Email varchar
  Teléfono varchar
  Posición varchar
  Notas varchar
}
