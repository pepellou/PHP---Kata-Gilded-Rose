DESCRIPCION DE LA KATA
======================

Tenemos un sistema de inventario desarrollado por un tipo un tanto peculiar y con poco sentido común llamado Leeory, ahora esta persiguiendo nuevas aventuras!, tanta paz lleves como descanso dejas amigo Leeroy!. Tu tarea consiste en añadir una nueva funcionalidad al sistema para que podamos empezar a vender una nueva categoría de items. Para empezar una pequeña introducción a nuestro sistema:

* Todos los items tienen una fecha de venta, SellIn , que especifica el número de días que tenemos para vender el item.
* Todos los items tienen una calidad , Quality , que especifica el valor que tiene un item.
* Al final del día el sistema reduce los valores para los dos valores de cada item.

Simple ¿no?, ahora empieza lo interesante:

* Los items degradan la calidad en una unidad por cada actualización.
* Cuando la fecha de venta a pasado, la calidad degrada al doble de velocidad.
* La calidad de un item no es nunca negativa.
* El item "aged brie" incrementa su calidad en lugar de decrementarla según pasan los días.
* La calidad de un item nunca es mayor de 50.
* El item "Sulfuras", nuestro articulo más legendario!, nunca debe venderse ni disminuye su calidad.
* Los "backstage passes" incrementan su calidad conforme se aproxima la fecha de venta. La calidad se incrementa por dos cuando quedan 10 días o menos para el concierto, por 3 cuando quedan 5 días o menos. Sin embargo la calidad disminuye a 0 después del concierto.

Hemos firmado un nuevo acuerdo para vender items "conjured", sin embargo necesitamos un cambio en el sistema:

* Los items "conjured" disminuyen de calidad el doble de rápido que el resto.

Por supuesto puedes hacer cualquier cambio al método updateQuality si lo consideras necesario mientras que todo siga funcionando claro esta!. Sin embargo hay dos cosas que no puedes hacer:

* Cambiar el interfaz y la forma de uso de la clase GildedRose , es feo, lo sabemos, pero tenemos muchos sistemas que la utilizan y no vamos a cambiarlos todos ahora!
* No puedes tocar la clase item!. Pertenece a una especie de goblin asesino que no cree en cosas como la propiedad colectiva del código.
