## Proyecto Framework PHP Laravel

Aclaraciones

Prendas
* Al cargar una prenda, el color seleccionado en el picker debe respetar el estandar de html colours.
https://htmlcolorcodes.com/es/
Esto es necesario realizarlo, para que despues el filtrado por color funcione segun lo esperado.

Pedidos / Detalle_pedidos
* Al cargar un pedido con sus respectivas prendas por API es porque se entiende que el pedido esta confirmado por el cliente y esta acción no puede revertirse. Es decir, no se permite realizar un update() o un destroy() una vez que el pedido esta creado, ya que para esto se deberia utilizar un estado del pedido y realizar un trackeo del mismo, ya que si esta en cierto estado deberia limitar las funcionalidades.
* La relacion detalle_pedidos al cargar un pedido queda implicita dentro del arreglo de prendas que se le envian en el body del request. De esta forma, se puede cargar un pedido y todas sus prendas asociadas con un solo request en lugar de tener que cargar el pedido y una vez creado, cargar prenda por prenda, lo cual implica hacer varias llamadas en la API.
* La fecha de crecion del pedido que antes se modelaba como un atributo mas de la entidad pedido, ahora se aprovechan los timestamps que ofrece laravel para utilizar la propiedad created_at que al fin y al cabo modela lo mismo, pero ya esta implementado sin necesidad de agregar nada. Lo unico que se necesita es configurar la zona horaria de los timestamps.

Funcionalidades
* En cuanto al admin se ofrecen busquedas por nombre para las tablas de Categorias, Marcas y Prendas, y busquedas por mail_cliente para los Pedidos.
* Mientras que a nivel de API se permite diversos filtrados adicionales que puede utilizar el usuario.
* Esto se realiza por simplicidad en las vistas y cuestiones de tiempo, pero ofrecer las mismas funcionalidades de filtrado para el admin como para clientes no es complicado, pero decidimos centrarnos en otros aspectos del desarrollo.

Documentacion 
* La manera de encontrar la documentacion de swagger es accediendo en el link de vercel: 
../rest/documentation
* La forma utilizada para documentar es la que ofrece swagger para hacerla directamente sobre el codigo, sin necesidad
de crear archivos yaml.
