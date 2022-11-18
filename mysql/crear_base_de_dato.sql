/*****CREAR BASE DE DATOS NUEVA*****************/
create DATABASE tienda_petscarlos;

/*****CREAR TABLA NUEVA*************************/
/*tabla huerfana iniciar sesion*/
create table inicio_sesion(
	correo varchar(50),
    contraseña varchar(50),
    nombre varchar(50),
    cargo varchar(50),
    PRIMARY KEY(correo)
)ENGINE=INNODB;

/*Crear tabla proveedor*/
create table proveedor(
      codprove int,
    nomempprove varchar(50),
    ciudad varchar(25),
    municipio varchar(25),
    codpostal varchar(10),
    codarea varchar(4),
    numprove varchar(25),
    nomprove varchar(50),
    cargoprove varchar(50),
    PRIMARY KEY(codprove)
)
ENGINE=INNODB;
/*Crear tabla categoria*/
create table categoria(
	codcat int,
    nomcat varchar(50),
    descat text,    
    imagen varchar(500),
    PRIMARY KEY(codcat)
)
ENGINE=INNODB;

/*Crear tabla producto*/
create table producto(
	codprod int,
    nomprod varchar(150),
    preunitprod int, 
    unistockprod int,
    unipedprod int,
    codcat int,
    codprove int,
    imgprod varchar(500),
    descprod varchar(1000),
    
    PRIMARY KEY(codprod),
    FOREIGN key(codcat) REFERENCES categoria(codcat),
    FOREIGN key(codprove) REFERENCES proveedor(codprove)
)
ENGINE=INNODB;

/*Crear tabla conductor*/
create table conductor(
	codcond int,
    nomcond varchar(50),
    apecond varchar(50),    
    PRIMARY KEY(codcond)    
)
ENGINE=INNODB;
/*Crear tabla cliente*/
create table cliente(
	cedcli int,
    prinomcli varchar(50),
    priapecli varchar(50),
    direccion varchar(200),
    estado varchar(35),    
    municipio varchar(35),
    sector varchar(35),
    telcli varchar(25),
    puntorefcli varchar(200),    
    PRIMARY KEY(cedcli)    
)ENGINE=INNODB;
/*Crear tabla pedido*/
create table pedido(
	codped int,
    fecped date,
    fecentped date, 
    codpost int,
    municipio varchar(35),
    sector varchar(35),
    direntped varchar(50),
    turentped varchar(50),
    totalbsped int,
    codcond int,
    cedcli int,
    codemp int,   
    fecenvioped date,
    PRIMARY KEY(codped)    
)
ENGINE=INNODB;
/*Crear tabla empleado*/
create table empleado(
	codemp int,
    nomemp varchar(50),
    apeemp varchar(50), 
    cargoemp varchar(50),
    pais varchar(35),
    estado varchar(35),
    ciudad varchar(35),
    municipio varchar(35),
    sector varchar(35),
    codpostal varchar(35),
    fecnaemp date, 
    reportaraemp int,
    PRIMARY KEY(codemp)    
)
ENGINE=INNODB;
/*Crear tabla producto_pedido*/
create table producto_pedido(
	cantidad int,
    descuento double,
    preciounit int, 
    codprod int,
    codped int,
    FOREIGN key(codprod) REFERENCES producto(codprod),
    FOREIGN key(codped) REFERENCES pedido(codped);
)
ENGINE=INNODB;

    /*Crear LLAVE foranea tabla pedido*/

alter table pedido
add FOREIGN KEY(codcond) REFERENCES conductor(codcond),
add FOREIGN KEY(cedcli) REFERENCES cliente(cedcli),
add FOREIGN KEY(codemp) REFERENCES empleado(codemp);

/*agregar llave foranea tabla inicio sesion*/

alter table inicio_sesion
add cedcli int,
add codemp int,
add FOREIGN KEY(cedcli) REFERENCES cliente(cedcli),
add FOREIGN KEY(codemp) REFERENCES empleado(codemp);




 /*INSERTAR REGISTROS DE LA BASE DE DATOS */
 insert into inicio_sesion(correo,contraseña)
VALUES('carlos_admin@gmail.com','123456'),
      ('jose_user@gmail.com','123456');

insert into proveedor(cargoprove,ciudad,codarea,numprove,codpostal,codprove,municipio,nomempprove,nomprove)
VALUES('vendedor','valencia','0241','8670790','2005','0001','zona industrial norte ','nestle','maria rodriguez'),
      ('vendedor','valencia','0241','8676569','2005','0002','los guayos','Mini Mascotas','alberto gil');

insert into categoria(codcat,nomcat,descat,imagen)
VALUES(000,'alimentos','alimento para perros cachorros y adultos','imagen categoria alimentos'),
      (001,'juguetes','juguetes para perros cachorros y adultos','imagen juguete alimentos');







insert into producto(codprod,nomprod,preunitprod,unistockprod,unipedprod,codcat,codprove,imgprod,descprod)
VALUES(0,'PURINA® DOG CHOW® ADULTOS MINIS Y PEQUEÑOS ',10,10,12,000,0001,'1.Dog_Chow_Maximus_Dry_Salud_Visible_Adultos_Minis_y_Pequenos.png','DOG CHOW CON EXTRALIFE, una mezcla especial de antioxidantes, vitaminas y minerales para maximizar la calidad de vida de tu perro. <br/>
Alimento 100% completo y balanceado que está específicamente formulado para perros adultos minis y pequeño de 1 a 7 años. Los perritos de raza pequeña tienen un metabolismo más acelerado, por eso Dog Chow cuenta con un alto nivel de proteína que asegura que su corazón esté fuerte y sano por más tiempo. <br/><br/>
•	 Alto nivel de proteína (23%) que aseguran que su corazón esté fuerte y sano.<br/>
•	 Con prebiótico natural y fibras naturales para una digestión sana y mejor absorción de nutrientes.<br/>
•	 Con Calcio para un óptimo crecimiento de huesos y dientes fuertes<br/>
•	 Con Omega 3 y 6 que promueven un pelaje brillante.<br/>
•	 Con croquetas más pequeñas para su tamaño.'),
      (1,'PURINA® DOG CHOW ADULTOS MEDIANOS Y GRANDES',10,10,12,000,0001,'2.Dog_Chow_Maximus_Dry_Salud_Visible_Adultos_Medianos_y_Grandes.png','DOG CHOW CON EXTRALIFE, una mezcla especial de antioxidantes, vitaminas y minerales para maximizar la calidad de vida de tu perro.  <br/>
Alimento 100% completo y balanceado que está específicamente formulado para perros adultos medianos y grandes de 1 a 7 años. Cuenta con los nutrientes e ingredientes de alta calidad que su cuerpo necesita para crecer sano y fuerte.<br/><br/>
•	 21% de proteína de alta calidad para músculos fuertes.<br/>
•	 Con prebiótico natural y fibras naturales para una digestión sana y mejor absorción de nutrientes.<br/>
•	 Con Calcio para un óptimo crecimiento de huesos y dientes fuertes.<br/>
•	 Con Omega 3 y 6 que promueven un pelaje brillante.<br/>
•	 Vitaminas y antioxidantes que ayudan a fortalecer las defensas naturales.
'),
      (2,'NUTRICIÓN ESPECIALIZADA EN PERROS MAYORES DE 7 AÑOS | PURINA® DOG CHOW® LONGEVIDAD',5,30,20,000,0001,'3.PURINA_DOG_CHOW_PERRO_ADULTO_7_LONGEVIDAD.png','Alimento balanceado completo para perros adultos de edad avanzada (mayores de 7 años) de todas los tamaños.<br/><br/>
•	 Tiene GLUCOSAMINA que evita el desgaste prematuro de las articulaciones.<br/>
•	 24% de proteína de alta calidad que mantiene sus músculos fuertes y sanos.<br/>
•	 Con una especial croqueta que tiene una textura especial y ayuda a su salud oral.<br/>
•	 Con prebiótico natural y fibras naturales para una digestión sana y mejor absorción de nutrientes.
'),
      (3,'MEZCLA ESPECIAL DE INGREDIENTES PURINA® DOG CHOW® DESTINADO AL CONTROL DE PESO ADULTOS TODAS LAS RAZAS',100,50,25,000,0002,'4.Dog_Chow_Perro_Adulto_Todo_Los_Tamanos.png','DOG CHOW CON EXTRALIFE, una mezcla especial de antioxidantes, vitaminas y minerales para maximizar la calidad de vida de tu perro. <br/>
Alimento 100% completo y balanceado que está específicamente formulado para perros adultos con sobrepeso y/o baja actividad física y/o castrados. Está diseñado para que tu perro controle la cantidad de calorías y logre el peso ideal, mientras disfruta de su deliciosa comida.<br/><br/>
•	 Contiene 20% menos de calorías, para el control del peso.<br/>
•	 24% de proteína que mantiene sus músculos fuertes mientras baja de peso.<br/>
•	 Con prebiótico natural y fibras naturales para una digestión sana y mejor absorción de nutrientes.<br/>
•	 Con Omega 3 y 6 que promueven un pelaje brillante.
'),
      (4,'PURINA® K-NINA® Carne, cereales y arroz',50,35,12,000,0002,'7.Purina_k-nina_Carne_cereales_arroz.png','Es un alimento completo, perfectamente horneado con distintas croquetas que representan verdaderos y sanos ingredientes, como crujientes granos, vegetales ricos en vitaminas y proteínas de carne de alta calidad.<br/><br/>
Edad de Consumo: De 1 año en adelante.<br/>
Formatos: 1kg, 2kg, 4kg, 8kg y 18kg.
'),      
      (5,'PURINA® K-NINA® Pollo y selección de vegetales',95,150,65,000,0002,'8.Purina_k-nina_Pollo_y_selección de vegetales.png','Es un alimento 100% completo y balanceado que mantendrá a tu perro feliz y emocionado cada vez que le des de comer. Su pancita se enamorará de la combinación especial de ingredientes saludables e increíbles sabores para que tu perro tenga siempre un alimento variado, nutritivo y balanceado.<br/>

Satisface totalmente todos los requerimientos nutricionales diarios de los perros adultos de cualquier raza, gracias a su combinación de proteínas y vegetales.<br/>
Edad de Consumo: De 1 año en adelante.<br/>
Formatos: 1kg, 2kg, 4kg, 8kg y 18kg.
');









      insert into producto(codprod,nomprod,preunitprod,unistockprod,unipedprod,codcat,codprove,imgprod)
VALUES(004,'perrarina 7',30,60,25,000,0001,'1'),
      (005,'perrarina 8 ',50,30,30,000,0001,'2'),
      (006,'perrarina 9 ',80,50,20,000,0001,'3');

insert into empleado(codemp,nomemp,apeemp,cargoemp,pais,estado,ciudad,municipio,sector,codpostal,fecnaemp,reportaraemp)
VALUES(000,'carlos','henriquez','supervisor del sistema','venezuela','carabobo','valencia','naguanagua','las quintas de naguanagua','2005','050505','001'),
      (001,'maria','mata','ventas','venezuela','carabobo','valencia','naguanagua','la esmeralda','2005','060606','001');

insert into cliente(cedcli,prinomcli,priapecli,direccion,estado,municipio,sector,telcli,puntorefcli)
VALUES(06346399,'daisy','jaime','av cementerio calle 1','carabobo','naguanagua','las quintas 1','04244454689','unefa'),
      (04896732,'isrrael','mora','av feo la cruz','carabobo','naguanagua','las quintas 3','las 04264567999','calle avenida feo la cruz');

insert into conductor(codcond,nomcond,apecond)
VALUES(000,'daniela','lobo'),
      (001,'oscar','mendoza');

insert into pedido(codped ,fecped,fecentped,codpost,municipio,sector,direntped,turentped,totalbsped,codcond ,cedcli ,codemp,fecenvioped)
VALUES(000,'060606','060606',2005,'san diego','la esmeralda','en la carreta a mano izquierda, a 3 casas','mañana',1235,000,06346399,000,'060606'),
      (001,'060606','060606',2005,'naguanagua','la granja 1','al frente de la centro deportivo verde magico','tarde',5004,001,04896732,001,'060606');

insert into producto_pedido(cantidad,descuento,preciounit,codprod ,codped )
VALUES(2,50,10,000,000),
      (1,10,5,002,001);


