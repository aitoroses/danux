<?php

class Create_Biblioteca_Materiales {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('l_biblioteca_materiales', function($table){
			$table->increments('id');
			$table->integer('type');
			$table->string('ref');
			$table->string('desc');
			$table->string('image');
			$table->timestamps();
		});

		$b_mat_puertas = array(
		  array('id' => '1','type' => '1','ref' => 'SP001','desc' => 'Metropolix-Fumo','image' => 'SP001-Metropolix-Fumo.jpg'),
		  array('id' => '2','type' => '1','ref' => 'SP002','desc' => 'Oxide-Perla','image' => 'SP002-Oxide-Perla.jpg'),
		  array('id' => '3','type' => '1','ref' => 'SP003','desc' => 'Metropolix-Neve','image' => 'SP003-Metropolix-Neve.jpg'),
		  array('id' => '4','type' => '1','ref' => 'SP004','desc' => 'Oxide-Nero','image' => 'SP004-Oxide-Nero.jpg'),
		  array('id' => '5','type' => '1','ref' => 'SP005','desc' => 'Metropolix-Nero','image' => 'SP005-Metropolix-Nero.jpg'),
		  array('id' => '6','type' => '1','ref' => 'SP006','desc' => 'Oxide-Moro','image' => 'SP006-Oxide-Moro.jpg'),
		  array('id' => '7','type' => '1','ref' => 'SP007','desc' => 'Metropolix-Moro','image' => 'SP007-Metropolix-Moro.jpg'),
		  array('id' => '8','type' => '1','ref' => 'SP008','desc' => 'Oxide-Avorio','image' => 'SP008-Oxide-Avorio.jpg'),
		  array('id' => '9','type' => '1','ref' => 'SP009','desc' => 'Naturali-Travertino-Avorio','image' => 'SP009-Naturali-Travertino-Avorio.jpg'),
		  array('id' => '10','type' => '1','ref' => 'SP010','desc' => 'Naturali-Crema-Marfil','image' => 'SP010-Naturali-Crema-Marfil.jpg'),
		  array('id' => '11','type' => '1','ref' => 'SP011','desc' => 'Sketch-Avorio','image' => 'SP011-Sketch-Avorio.jpg'),
		  array('id' => '12','type' => '1','ref' => 'SP012','desc' => 'Sketch-Negro','image' => 'SP012-Sketch-Negro.jpg'),
		  array('id' => '13','type' => '1','ref' => 'SP013','desc' => 'Sketch-Tortora','image' => 'SP013-Sketch-Tortora.jpg'),
		  array('id' => '14','type' => '1','ref' => 'SP014','desc' => 'Sketch-Moro','image' => 'SP014-Sketch-Moro.jpg'),
		  array('id' => '15','type' => '1','ref' => 'SP015','desc' => 'Naturali-Ossidiana-Vena-Oscura','image' => 'SP015-Naturali-Ossidiana-Vena-Oscura.jpg'),
		  array('id' => '16','type' => '1','ref' => 'SP016','desc' => 'Pan-de-Oro','image' => 'SP016-Pan-de-Oro.jpg'),
		  array('id' => '17','type' => '1','ref' => 'SP017','desc' => 'Pan-de-Plata','image' => 'SP017-Pan-de-Plata.jpg'),
		  array('id' => '18','type' => '2','ref' => '425C','desc' => '','image' => '425C.jpg'),
		  array('id' => '19','type' => '2','ref' => '1014','desc' => '','image' => '1014.jpg'),
		  array('id' => '20','type' => '2','ref' => '1164','desc' => '','image' => '1164.jpg'),
		  array('id' => '21','type' => '2','ref' => '1342','desc' => '','image' => '1342.jpg'),
		  array('id' => '22','type' => '2','ref' => '1435','desc' => '','image' => '1435.jpg'),
		  array('id' => '23','type' => '2','ref' => '1586','desc' => '','image' => '1586.jpg'),
		  array('id' => '24','type' => '2','ref' => '1601','desc' => '','image' => '1601.jpg'),
		  array('id' => '25','type' => '2','ref' => '1603','desc' => '','image' => '1603.jpg'),
		  array('id' => '26','type' => '2','ref' => '1604','desc' => '','image' => '1604.jpg'),
		  array('id' => '27','type' => '2','ref' => '2001','desc' => '','image' => '2001.jpg'),
		  array('id' => '28','type' => '2','ref' => '2230','desc' => '','image' => '2230.jpg'),
		  array('id' => '29','type' => '2','ref' => '2232','desc' => '','image' => '2232.jpg'),
		  array('id' => '30','type' => '2','ref' => '3004','desc' => '','image' => '3004.jpg'),
		  array('id' => '31','type' => '2','ref' => '4006','desc' => '','image' => '4006.jpg'),
		  array('id' => '32','type' => '2','ref' => '5002','desc' => '','image' => '5002.jpg'),
		  array('id' => '33','type' => '2','ref' => '7035','desc' => '','image' => '7035.jpg'),
		  array('id' => '34','type' => '2','ref' => '8017','desc' => '','image' => '8017.jpg'),
		  array('id' => '35','type' => '2','ref' => '9006','desc' => '','image' => '9006.jpg'),
		  array('id' => '36','type' => '2','ref' => 'blanco','desc' => '','image' => 'blanco.jpg'),
		  array('id' => '83','type' => '3','ref' => 'SD001-78','desc' => 'WHITE-SR209','image' => 'SD001-78E-WHITE-SR209.jpg'),
		  array('id' => '84','type' => '3','ref' => 'SD002-18','desc' => 'CREMA-EBRO','image' => 'SD002-185-CREMA-EBRO.jpg'),
		  array('id' => '85','type' => '3','ref' => 'SD003-13','desc' => 'CAPUCHINO','image' => 'SD003-13C-CAPUCHINO.jpg'),
		  array('id' => '86','type' => '3','ref' => 'SD004-17','desc' => 'ROJO','image' => 'SD004-172-ROJO.jpg'),
		  array('id' => '87','type' => '3','ref' => 'SD005-16','desc' => 'BURDEOS','image' => 'SD005-164-BURDEOS.jpg'),
		  array('id' => '88','type' => '3','ref' => 'SD006-14','desc' => 'TOFFE','image' => 'SD006-14C-TOFFE.jpg'),
		  array('id' => '89','type' => '3','ref' => 'SD007-09','desc' => 'GRIS-TORMENTA','image' => 'SD007-09F-GRIS-TORMENTA.jpg'),
		  array('id' => '90','type' => '3','ref' => 'SD008-88','desc' => 'GRIS-BIZOT','image' => 'SD008-88D-GRIS-BIZOT.jpg'),
		  array('id' => '91','type' => '3','ref' => 'SD009-23','desc' => 'NEGRO','image' => 'SD009-231-NEGRO.jpg'),
		  array('id' => '92','type' => '3','ref' => 'SD010-93','desc' => 'AZUL-KLEIN','image' => 'SD010-93F-AZUL-KLEIN.jpg'),
		  array('id' => '93','type' => '3','ref' => 'SD011-52','desc' => 'F-EXPRESSO','image' => 'SD011-52F-F-EXPRESSO.jpg'),
		  array('id' => '94','type' => '3','ref' => 'SD012-51','desc' => 'F-CAPRICCIO','image' => 'SD012-51F-F-CAPRICCIO.jpg'),
		  array('id' => '95','type' => '3','ref' => 'SD013-53','desc' => 'F-NOIR','image' => 'SD013-53F-F-NOIR.jpg'),
		  array('id' => '96','type' => '3','ref' => 'SD014-70','desc' => 'PERLA','image' => 'SD014-70A-PERLA.jpg'),
		  array('id' => '97','type' => '3','ref' => 'SD015-28','desc' => 'BURBUJAS-POP','image' => 'SD015-28F-BURBUJAS-POP.jpg'),
		  array('id' => '98','type' => '3','ref' => 'SD016-28','desc' => 'BURBUJAS-POP-(2)','image' => 'SD016-28F-BURBUJAS-POP-(2).jpg'),
		  array('id' => '99','type' => '3','ref' => 'SD017-71','desc' => 'WHITE-GARDEN-(2)','image' => 'SD017-71F-WHITE-GARDEN-(2).jpg'),
		  array('id' => '100','type' => '3','ref' => 'SD018-05','desc' => 'GARDEN-(2)','image' => 'SD018-05F-GARDEN-(2).jpg'),
		  array('id' => '101','type' => '3','ref' => 'SD019-43','desc' => 'EOLO-copia-(2)','image' => 'SD019-43G-EOLO-copia-(2).jpg'),
		  array('id' => '102','type' => '3','ref' => 'SD020-89','desc' => 'EOLO-AZABACHE-(2)','image' => 'SD020-89G-EOLO-AZABACHE-(2).jpg'),
		  array('id' => '103','type' => '3','ref' => 'SD021-08','desc' => 'CLARO-TECH-(2)','image' => 'SD021-08B-CLARO-TECH-(2).jpg'),
		  array('id' => '104','type' => '3','ref' => 'SD022-70','desc' => 'TESSUTO-(2)','image' => 'SD022-70F-TESSUTO-(2).jpg'),
		  array('id' => '105','type' => '3','ref' => 'SD023-46','desc' => 'CB-BLANCO-(2)','image' => 'SD023-46D-CB-BLANCO-(2).jpg'),
		  array('id' => '106','type' => '3','ref' => 'SD024-47','desc' => 'CB-NEGRO-(2)','image' => 'SD024-47D-CB-NEGRO-(2).jpg'),
		  array('id' => '107','type' => '3','ref' => 'SD025-06','desc' => 'CEMENTO-(2)','image' => 'SD025-06F-CEMENTO-(2).jpg'),
		  array('id' => '108','type' => '3','ref' => 'SD026-94','desc' => 'PIZARRA-(2)','image' => 'SD026-94D-PIZARRA-(2).jpg'),
		  array('id' => '109','type' => '3','ref' => 'SD027-29','desc' => 'GRAY-CODE-(2)','image' => 'SD027-29G-GRAY-CODE-(2).jpg'),
		  array('id' => '110','type' => '3','ref' => 'SD028-31','desc' => 'CUBOS-2D-(2)','image' => 'SD028-31G-CUBOS-2D-(2).jpg'),
		  array('id' => '111','type' => '3','ref' => 'SD029-89','desc' => 'ALUMINIO-(2)','image' => 'SD029-890-ALUMINIO-(2).jpg'),
		  array('id' => '112','type' => '3','ref' => 'SD030-73','desc' => 'HAYA-FANGIO-(2)','image' => 'SD030-734-HAYA-FANGIO-(2).jpg'),
		  array('id' => '113','type' => '3','ref' => 'SD031-40','desc' => 'CEREZO-TIRON','image' => 'SD031-408-CEREZO-TIRON.jpg'),
		  array('id' => '114','type' => '3','ref' => 'SD032-20','desc' => 'CEREZO-XACOBEO','image' => 'SD032-20B-CEREZO-XACOBEO.jpg'),
		  array('id' => '115','type' => '3','ref' => 'SD033-24','desc' => 'PINO-GINEBRA','image' => 'SD033-24G-PINO-GINEBRA.jpg'),
		  array('id' => '116','type' => '3','ref' => 'SD034-39','desc' => 'TEKA-ASTURIAS','image' => 'SD034-39D-TEKA-ASTURIAS.jpg'),
		  array('id' => '117','type' => '3','ref' => 'SD035-91','desc' => 'ROBLE-RENOVALES','image' => 'SD035-91B-ROBLE-RENOVALES.jpg'),
		  array('id' => '118','type' => '3','ref' => 'SD036-04','desc' => 'CALVADOS-OSCURO','image' => 'SD036-044-CALVADOS-OSCURO.jpg'),
		  array('id' => '119','type' => '3','ref' => 'SD037-02','desc' => 'EBANO-LUXURI','image' => 'SD037-02C-EBANO-LUXURI.jpg'),
		  array('id' => '120','type' => '3','ref' => 'SD038-57','desc' => 'SATIN-OLAVE','image' => 'SD038-57F-SATIN-OLAVE.jpg'),
		  array('id' => '121','type' => '3','ref' => 'SD039-91','desc' => 'ROBLE-NATURAL','image' => 'SD039-910-ROBLE-NATURAL.jpg'),
		  array('id' => '122','type' => '3','ref' => 'SD040-52','desc' => 'WENGE-L01','image' => 'SD040-52A-WENGE-L01.jpg'),
		  array('id' => '123','type' => '3','ref' => 'SD041-00','desc' => 'ROBLE-BELLO','image' => 'SD041-008-ROBLE-BELLO.jpg'),
		  array('id' => '124','type' => '3','ref' => 'SD042-78','desc' => 'SAPELLY-RAMEADO','image' => 'SD042-780-SAPELLY-RAMEADO.jpg'),
		  array('id' => '125','type' => '3','ref' => 'SD044-17','desc' => 'PINO-CERVINO','image' => 'SD044-17G-PINO-CERVINO.jpg'),
		  array('id' => '126','type' => '3','ref' => 'SD045-17','desc' => 'CEBRANO','image' => 'SD045-17B-CEBRANO.jpg'),
		  array('id' => '141','type' => '4','ref' => 'SX001','desc' => 'Blanco','image' => 'SX001-Blanco.jpg'),
		  array('id' => '142','type' => '4','ref' => 'SX002','desc' => 'Magnolia','image' => 'SX002-Magnolia.jpg'),
		  array('id' => '143','type' => '4','ref' => 'SX003','desc' => 'Naranja','image' => 'SX003-Naranja.jpg'),
		  array('id' => '144','type' => '4','ref' => 'SX004','desc' => 'Burdeos','image' => 'SX004-Burdeos.jpg'),
		  array('id' => '145','type' => '4','ref' => 'SX005','desc' => 'Rojo','image' => 'SX005-Rojo.jpg'),
		  array('id' => '146','type' => '4','ref' => 'SX006','desc' => 'Berenjena','image' => 'SX006-Berenjena.jpg'),
		  array('id' => '147','type' => '4','ref' => 'SX007','desc' => 'Antracita','image' => 'SX007-Antracita.jpg'),
		  array('id' => '148','type' => '4','ref' => 'SX008','desc' => 'Negro','image' => 'SX008-Negro.jpg'),
		  array('id' => '149','type' => '4','ref' => 'SX009','desc' => 'Pistacho','image' => 'SX009-Pistacho.jpg'),
		  array('id' => '150','type' => '4','ref' => 'SX010','desc' => 'Gris','image' => 'SX010-Gris.jpg'),
		  array('id' => '151','type' => '4','ref' => 'SX011','desc' => 'Olivo','image' => 'SX011-Olivo.jpg'),
		  array('id' => '152','type' => '4','ref' => 'SX012','desc' => 'Textil-Plata','image' => 'SX012-Textil-Plata.jpg'),
		  array('id' => '153','type' => '4','ref' => 'SX013','desc' => 'Textil-Dorado','image' => 'SX013-Textil-Dorado.jpg'),
		  array('id' => '154','type' => '4','ref' => 'SX014','desc' => 'Onda-Negro','image' => 'SX014-Onda-Negro.jpg'),
		  array('id' => '155','type' => '5','ref' => 'SM001','desc' => 'Cerezo-Natural','image' => 'SM001-Cerezo-Natural.jpg'),
		  array('id' => '156','type' => '5','ref' => 'SM002','desc' => 'Cerezo-Vej','image' => 'SM002-Cerezo-Vej.jpg'),
		  array('id' => '157','type' => '5','ref' => 'SM003','desc' => 'Roble','image' => 'SM003-Roble.jpg'),
		  array('id' => '158','type' => '5','ref' => 'SM004','desc' => 'Sapelly','image' => 'SM004-Sapelly.jpg'),
		  array('id' => '159','type' => '5','ref' => 'SM011','desc' => 'Laca-Blanca','image' => 'SM011-Laca-Blanca.jpg'),
		  array('id' => '160','type' => '5','ref' => 'SM012','desc' => 'Laca-Marfil','image' => 'SM012-Laca-Marfil.jpg'),
		  array('id' => '161','type' => '5','ref' => 'SM013','desc' => 'Laca-Envejecida','image' => 'SM013-Laca-Envejecida.jpg'),
		  array('id' => '162','type' => '5','ref' => 'SM014','desc' => 'Laca-Antracita','image' => 'SM014-Laca-Antracita.jpg'),
		  array('id' => '163','type' => '5','ref' => 'SM015','desc' => 'Laca-Color','image' => 'SM015-Laca-Color.jpg'),
		  array('id' => '164','type' => '5','ref' => 'SM005','desc' => 'Wenge','image' => 'SP005-Wenge.jpg'),
		  array('id' => '165','type' => '5','ref' => 'SM006','desc' => 'Ceniza','image' => 'SP006-Ceniza.jpg'),
		  array('id' => '166','type' => '5','ref' => 'SM007','desc' => 'Haya-Nat','image' => 'SP007-Haya-Nat.jpg'),
		  array('id' => '167','type' => '5','ref' => 'SM008','desc' => 'Haya-Vap','image' => 'SP008-Haya-Vap.jpg'),
		  array('id' => '168','type' => '5','ref' => 'SM009','desc' => 'Nogal-Nat','image' => 'SP009-Nogal-Nat.jpg'),
		  array('id' => '169','type' => '5','ref' => 'SM010','desc' => 'Nogal-Vej','image' => 'SP010-Nogal-Vej.jpg')
		);

		foreach ($b_mat_puertas as $mat) {
			DB::table('l_biblioteca_materiales')->insert(array(
				'id' => $mat["id"],
				'type' => $mat["type"],
				'ref' => $mat["ref"],
				'desc' => $mat["desc"],
				'image' => $mat["image"],
				'created_at' => date('y-m-d H:m:s'),
				'updated_at' => date('y-m-d H:m:s')
			));
		}

	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('l_biblioteca_materiales');
	}

}