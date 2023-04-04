## Proyecto Inicial

- Respecto del modelo E-R:

Las entidades que se utilizan son:
* Pedido
* Prenda
* DetallePedido (relación Pedido-Prenda)
* Marca
* Categoria

El diagrama E-R asociado al modelo esta en el repositorio del proyecto.

- Respecto al [Proyecto Framework PHP - Laravel]

* Las entidades que se podran actualizar son: Prenda, Marca y Categoría.
* Los reportes que se podran generar son: 
    - Historial de pedidos
    - Prendas asociadas a un pedido en particular
    - Prendas correspondientes a una Marca
    - Prendas correspondientes a una Categoria 
* Las entidades que se podrán obtener por API son: Prenda, Marca, Categoria.
* Las entidades que se podrán modificar por API son: Pedido, DetallePedido.
    
- Respecto al [Proyecto Javascript - React/Vue]
* La informacion que podra ver el usuario respecto de las entidades es la siguiente:
    - Prenda: precio, imagen, talle, color, descripcion
    - Marca: nombre, descripcion
    - Categoria: nombre
  Ademas de que esta informacion estara estructurada de acuerdo a una pagina de inicio (imagenes, marcas, productos), que sera basicamente una presentación de la pagina.
  Respecto de los productos, la idea es mostrarlos de manera aleatoria o prestablecida en la pagina de inicio (un conjunto de los mismos) y brindar la posibilidad de filtrado por marca, por categoria, por rango de precio, entre otros. Tanto las categorias, como las marcas se podran visualizar en la barra superior para poder seleccionarlas, acompañadas de un buscador para realizar busquedas mas especificas, informacion de contacto y botones para redireccionar a las redes sociales.
*  Las acciones que podra realizar el usuario son entre ellas:
    - Realizar busquedas y filtrados: buscador, categoria, marca, rango de precios, talle, color.
    - Agregar un articulo al carrito.
    - Realizar la compra del carrito.
    - Ver sus pedidos realizados y la informacion asociada a cada pedido.

* Las migrations realizadas para crear la base de datos son:
    - marcas
    - categorias
    - prendas
    - pedidos
    - detalle_pedidos
  El motor utilizado es PostgreSQL.
* Los seeders son implementados con factories e incluyen datos de prueba para:
    - 100 categorias
    - 100 marcas
    - 500 pedidos
    - 500 prendas
    - 1000 detalle_pedidos
  creados con Faker, con el fin de abarcar una amplia variedad de casos.
  Para la creacion de detalle_pedidos y prenda en las factories, utilizamos random para establecer las llaves foraneas, ya que sabemos de antemano la cantidad de entidades que utilizamos y los ids en laravel son incrementales (1..n). En lugar de esto, es posible utilizar pluck() que permite obtener las columnas que se le especifica por parametro de las tablas creadas y mapearlas a un arreglo, pero la función es ineficiente a la hora de crear grandes cantidades de entidades. Es por esto que decidimos usar esta simplificación y evitar el tiempo extra que conlleva.
  Además, entendemos que para identificar un detalle_pedido basta con utilizar las llaves foraneas de las entidades pedido y prenda como llave primaria, pero debido a los standares de laravel y evitar complejidad, le dejamos el id() que viene por defecto como llave primaria.
