<?php

class Create_Biblioteca_Accesorios_Interior {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('l_biblioteca_accesorios_interior', function($table){
			$table->increments('id');
			$table->string('desc');
			$table->string('points');
			$table->integer('type');
			$table->integer('proveedor');
			$table->string('ref');
			$table->string('img');
			$table->timestamps();
		});

		$b_acc = array(
		  array('id' => '775','desc' => 'barra De Extracción Total "halcon" 35 Cm','points' => '17.68','type' => '0','proveedor' => '1','ref' => '43351','img' => ''),
		  array('id' => '776','desc' => 'barra De Extracción Total "halcon" 38 Cm','points' => '18.45','type' => '0','proveedor' => '1','ref' => '43401','img' => ''),
		  array('id' => '777','desc' => 'barra De Extracción Total "halcon" 48 Cm','points' => '20.96','type' => '0','proveedor' => '1','ref' => '43501','img' => ''),
		  array('id' => '778','desc' => 'barra De Extracción Total "halcon" 77 Cm','points' => '33.24','type' => '0','proveedor' => '1','ref' => '43801','img' => ''),
		  array('id' => '779','desc' => 'cesta De Tela Adaptable Gacela Alto 14 / Ancho 35-45','points' => '25.24','type' => '0','proveedor' => '1','ref' => '23311','img' => '23311_23421.jpg'),
		  array('id' => '780','desc' => 'cesta De Tela Adaptable Gacela Alto 14 / Ancho 45-55','points' => '27.3','type' => '0','proveedor' => '1','ref' => '23411','img' => '23311_23421.jpg'),
		  array('id' => '781','desc' => 'cesta De Tela Adaptable Gacela Alto 14 / Ancho 55-65','points' => '30.91','type' => '0','proveedor' => '1','ref' => '23511','img' => '23311_23421.jpg'),
		  array('id' => '782','desc' => 'cesta De Tela Adaptable Gacela Alto 20 / Ancho 35-45','points' => '27.82','type' => '0','proveedor' => '1','ref' => '23321','img' => '23311_23421.jpg'),
		  array('id' => '783','desc' => 'cesta De Tela Adaptable Gacela Alto 20 / Ancho 55-65','points' => '32.46','type' => '0','proveedor' => '1','ref' => '23521','img' => '23311_23421.jpg'),
		  array('id' => '784','desc' => 'cesta De Tela Adaptable Gacela Alto 20/ Ancho 45-55','points' => '30.4','type' => '0','proveedor' => '1','ref' => '23421','img' => '23311_23421.jpg'),
		  array('id' => '785','desc' => 'colgador De Botas','points' => '7.71','type' => '0','proveedor' => '1','ref' => '66121','img' => '66121.jpg'),
		  array('id' => '786','desc' => 'corbatero-cinturonero  Fijo "vision" 30 Cm','points' => '4.05','type' => '0','proveedor' => '1','ref' => '12321','img' => ''),
		  array('id' => '787','desc' => 'corbatero-cinturonero  Fijo "vision" 39 Cm','points' => '4.12','type' => '0','proveedor' => '1','ref' => '12421','img' => ''),
		  array('id' => '788','desc' => 'corbatero-cinturonero Lateral Extraíble "camaleon"','points' => '14.26','type' => '0','proveedor' => '1','ref' => '11441','img' => ''),
		  array('id' => '789','desc' => 'elevador De Ropa "basic" 45-60','points' => '22.5','type' => '0','proveedor' => '1','ref' => '74000','img' => '74000_74100.jpg'),
		  array('id' => '790','desc' => 'elevador De Ropa "basic" 60-83','points' => '23.25','type' => '0','proveedor' => '1','ref' => '74100','img' => '74000_74100.jpg'),
		  array('id' => '791','desc' => 'empujamangas "toro" Der','points' => '13.29','type' => '0','proveedor' => '1','ref' => '21321d','img' => '21321d_24321i.jpg'),
		  array('id' => '792','desc' => 'empujamangas "toro" Iz','points' => '13.29','type' => '0','proveedor' => '1','ref' => '24321 I','img' => '21321d_24321i.jpg'),
		  array('id' => '793','desc' => 'espejo Extraíble  "lago De Sanabria"','points' => '108.86','type' => '0','proveedor' => '1','ref' => '90000','img' => '90000.jpg'),
		  array('id' => '794','desc' => 'pantalonero Bajo Balda Extraíble "do„ana" C/ Doble','points' => '39.65','type' => '0','proveedor' => '1','ref' => '37501','img' => '37501.jpg'),
		  array('id' => '795','desc' => 'pantalonero Bajo Balda Extraíble  Der "moncayo" ','points' => '33.51','type' => '0','proveedor' => '1','ref' => '35501d','img' => '35501d_i.jpg'),
		  array('id' => '796','desc' => 'pantalonero Bajo Balda Extraíble  Der "moncayo" ','points' => '33.51','type' => '0','proveedor' => '1','ref' => '35501d','img' => '35501d_i.jpg'),
		  array('id' => '797','desc' => 'pantalonero Bajo Balda Extraíble  Iz "moncayo" ','points' => '33.51','type' => '0','proveedor' => '1','ref' => '35501i','img' => '35501d_i.jpg'),
		  array('id' => '798','desc' => 'pantalonero Bajo Balda Extraíble  Iz "moncayo" ','points' => '33.51','type' => '0','proveedor' => '1','ref' => '35501i','img' => '35501d_i.jpg'),
		  array('id' => '799','desc' => 'pantalonero Doble Extraíble "milano"14b ','points' => '27','type' => '0','proveedor' => '1','ref' => '33141','img' => '33141.jpg'),
		  array('id' => '800','desc' => 'pantalonero Doble Extraíble "milano"14b ','points' => '27','type' => '0','proveedor' => '1','ref' => '33141','img' => '33141.jpg'),
		  array('id' => '801','desc' => 'pantalonero Doble Extraíble "milano"14b C/ Goma Antide ','points' => '37.64','type' => '0','proveedor' => '1','ref' => '33141g','img' => '33141_33181g.jpg'),
		  array('id' => '802','desc' => 'pantalonero Doble Extraíble "milano"14b C/ Goma Antide ','points' => '37.64','type' => '0','proveedor' => '1','ref' => '33141g','img' => '33141_33181g.jpg'),
		  array('id' => '803','desc' => 'pantalonero Doble Extraíble "milano"18b','points' => '28.5','type' => '0','proveedor' => '1','ref' => '33181','img' => '33181.jpg'),
		  array('id' => '804','desc' => 'pantalonero Doble Extraíble "milano"18b','points' => '28.5','type' => '0','proveedor' => '1','ref' => '33181','img' => '33181.jpg'),
		  array('id' => '805','desc' => 'pantalonero Doble Extraíble "milano"18b C/ Goma Antide ','points' => '41.91','type' => '0','proveedor' => '1','ref' => '33181g','img' => '33141_33181g.jpg'),
		  array('id' => '806','desc' => 'pantalonero Doble Extraíble "milano"18b C/ Goma Antide ','points' => '41.91','type' => '0','proveedor' => '1','ref' => '33181g','img' => '33141_33181g.jpg'),
		  array('id' => '807','desc' => 'pantalonero Extraíble  Lateral "bahia Mazarron" 12b','points' => '78.15','type' => '0','proveedor' => '1','ref' => '320401g','img' => '320401g_320501g.jpg'),
		  array('id' => '808','desc' => 'pantalonero Extraíble  Lateral "bahia Mazarron" 12b','points' => '78.15','type' => '0','proveedor' => '1','ref' => '320401g','img' => '320401g_320501g.jpg'),
		  array('id' => '809','desc' => 'pantalonero Extraíble  Lateral "bahia Mazarron" 15b','points' => '82','type' => '0','proveedor' => '1','ref' => '320501g','img' => '320401g_320501g.jpg'),
		  array('id' => '810','desc' => 'pantalonero Extraíble  Lateral "bahia Mazarron" 15b','points' => '82','type' => '0','proveedor' => '1','ref' => '320501g','img' => '320401g_320501g.jpg'),
		  array('id' => '811','desc' => 'pantalonero Tirador Extraíble "loija"  9 B F40antideslizante','points' => '24.2','type' => '0','proveedor' => '1','ref' => '31091g','img' => '31091g.jpg'),
		  array('id' => '812','desc' => 'pantalonero Tirador Extraíble "loija"  9 B F40antideslizante','points' => '24.2','type' => '0','proveedor' => '1','ref' => '31091g','img' => '31091g.jpg'),
		  array('id' => '813','desc' => 'pantalonero Tirador Extraíble "loija" 12 B F50 Antideslizante','points' => '26.44','type' => '0','proveedor' => '1','ref' => '31121g','img' => '31091g.jpg'),
		  array('id' => '814','desc' => 'pantalonero Tirador Extraíble "loija" 12 B F50 Antideslizante','points' => '26.44','type' => '0','proveedor' => '1','ref' => '31121g','img' => '31091g.jpg'),
		  array('id' => '815','desc' => 'pantalonero Tirador Extraíble "loija"11 B F50 Antideslizante','points' => '25.45','type' => '0','proveedor' => '1','ref' => '31111g','img' => '31091g.jpg'),
		  array('id' => '816','desc' => 'pantalonero Tirador Extraíble "loija"11 B F50 Antideslizante','points' => '25.45','type' => '0','proveedor' => '1','ref' => '31111g','img' => '31091g.jpg'),
		  array('id' => '817','desc' => 'pantalonero Tirador Extraíble "loija"14 B F55 Antideslizante','points' => '33.58','type' => '0','proveedor' => '1','ref' => '31141g','img' => '31091g.jpg'),
		  array('id' => '818','desc' => 'pantalonero Tirador Extraíble "loija"14 B F55 Antideslizante','points' => '33.58','type' => '0','proveedor' => '1','ref' => '31141g','img' => '31091g.jpg'),
		  array('id' => '819','desc' => 'percha Pantalonero  Doble "do„ana"','points' => '1.63','type' => '0','proveedor' => '1','ref' => '53371','img' => ''),
		  array('id' => '820','desc' => 'percha Pantalonero"moncayo"','points' => '1.63','type' => '0','proveedor' => '1','ref' => '53351','img' => ''),
		  array('id' => '821','desc' => 'tabla De Planchar Extraíble "basic"','points' => '36','type' => '0','proveedor' => '1','ref' => '80000','img' => '80000.jpg'),
		  array('id' => '822','desc' => 'zapatero Adaptable "fijo" 48-83 Cm','points' => '6.07','type' => '0','proveedor' => '1','ref' => '624883','img' => '624883.jpg'),
		  array('id' => '823','desc' => 'zapatero Adaptable "fijo" 83-113 Cm','points' => '7.61','type' => '0','proveedor' => '1','ref' => '628313','img' => '624883.jpg'),
		  array('id' => '824','desc' => 'zapatero De Filas "peñon De Ifach" 32x45','points' => '10.71','type' => '0','proveedor' => '1','ref' => '68021z','img' => '68021z.jpg'),
		  array('id' => '825','desc' => 'zapatero De Filas "peñon De Ifach" 32x45','points' => '10.71','type' => '0','proveedor' => '1','ref' => '68021z','img' => '68021z.jpg'),
		  array('id' => '826','desc' => 'zapatero De Filas "peñon De Ifach" 32x65','points' => '13.3','type' => '0','proveedor' => '1','ref' => '68031z','img' => '68021z.jpg'),
		  array('id' => '827','desc' => 'zapatero De Filas "peñon De Ifach" 32x65','points' => '13.3','type' => '0','proveedor' => '1','ref' => '68031z','img' => '68021z.jpg'),
		  array('id' => '828','desc' => 'zapatero De Filas "peñon De Ifach" 32x85','points' => '16.1','type' => '0','proveedor' => '1','ref' => '68041z','img' => '68021z.jpg'),
		  array('id' => '829','desc' => 'zapatero De Filas "peñon De Ifach" 32x85','points' => '16.1','type' => '0','proveedor' => '1','ref' => '68041z','img' => '68021z.jpg'),
		  array('id' => '830','desc' => 'zapatero De Filas "peñon De Ifach" 43x65','points' => '17.5','type' => '0','proveedor' => '1','ref' => '68131b','img' => '68021z.jpg'),
		  array('id' => '831','desc' => 'zapatero De Filas "peñon De Ifach" 43x65','points' => '17.5','type' => '0','proveedor' => '1','ref' => '68131b','img' => '68021z.jpg'),
		  array('id' => '832','desc' => 'zapatero De Filas "peñon De Ifach" 43x85','points' => '21','type' => '0','proveedor' => '1','ref' => '68141b ','img' => '68021z.jpg'),
		  array('id' => '833','desc' => 'zapatero De Filas "peñon De Ifach" 43x85','points' => '21','type' => '0','proveedor' => '1','ref' => '68141b ','img' => '68021z.jpg'),
		  array('id' => '834','desc' => 'zapatero De Filas "peñon De Ifach"43x45','points' => '14.21','type' => '0','proveedor' => '1','ref' => '68121b','img' => '68021z.jpg'),
		  array('id' => '835','desc' => 'zapatero De Filas "peñon De Ifach"43x45','points' => '14.21','type' => '0','proveedor' => '1','ref' => '68121b','img' => '68021z.jpg'),
		  array('id' => '836','desc' => 'zapatero Extraíble Adaptable "lago De Banyoles" 40-60 Cm','points' => '39.2','type' => '0','proveedor' => '1','ref' => '67401','img' => '67401_67121.jpg'),
		  array('id' => '837','desc' => 'zapatero Extraíble Adaptable "lago De Banyoles" 50-80 Cm','points' => '41.49','type' => '0','proveedor' => '1','ref' => '67501','img' => '67401_67121.jpg'),
		  array('id' => '838','desc' => 'zapatero Extraíble Adaptable "lago De Banyoles" 60-100 Cm','points' => '44.93','type' => '0','proveedor' => '1','ref' => '67601','img' => '67401_67121.jpg'),
		  array('id' => '839','desc' => 'zapatero Extraíble Adaptable "lago De Banyoles" 75-120','points' => '49.91','type' => '0','proveedor' => '1','ref' => '67121','img' => '67401_67121.jpg'),
		  array('id' => '840','desc' => 'zapatero Extraíble Adaptable Para Frente "lobo" 38-60 Cm','points' => '23.12','type' => '0','proveedor' => '1','ref' => '64401','img' => '64401_64121.jpg'),
		  array('id' => '841','desc' => 'zapatero Extraíble Adaptable Para Frente "lobo" 48-80 Cm','points' => '24.18','type' => '0','proveedor' => '1','ref' => '64501','img' => '64401_64121.jpg'),
		  array('id' => '842','desc' => 'zapatero Extraíble Adaptable Para Frente "lobo" 58-100 Cm','points' => '26.09','type' => '0','proveedor' => '1','ref' => '64601','img' => '64401_64121.jpg'),
		  array('id' => '843','desc' => 'zapatero Extraíble Adaptable Para Frente "lobo" 75-120 Cm','points' => '30.81','type' => '0','proveedor' => '1','ref' => '64121','img' => '64401_64121.jpg'),
		  array('id' => '844','desc' => 'zapatero Lateral "reno Excutive" 10 Bal','points' => '103.6','type' => '0','proveedor' => '1','ref' => '62551e','img' => '62551e.jpg'),
		  array('id' => '845','desc' => 'zapatero Lateral "reno Excutive" 6 Bal','points' => '65.8','type' => '0','proveedor' => '1','ref' => '62251e','img' => '62251e.jpg'),
		  array('id' => '846','desc' => 'zapatero Lateral "reno" 2 Baldas','points' => '23.42','type' => '0','proveedor' => '1','ref' => '62251','img' => '62251_62551.jpg'),
		  array('id' => '847','desc' => 'zapatero Lateral "reno" 4 Baldas','points' => '36.01','type' => '0','proveedor' => '1','ref' => '62551','img' => '62251_62551.jpg')
		);

		foreach ($b_acc as $acc) {
			DB::table('l_biblioteca_accesorios_interior')->insert(array(
				'desc' => $acc["desc"],
				'points' => $acc["points"],
				'type' => $acc["type"],
				'proveedor' => $acc["proveedor"],
				'ref' => $acc["ref"],
				'img' => $acc["img"],
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
		Schema::drop('l_biblioteca_accesorios_interior');
	}

}