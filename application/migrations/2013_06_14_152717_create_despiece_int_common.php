<?php

class Create_Despiece_Int_Common {

    /**
     * Creates de common pieces
     *
     * @return void
     */
    public function up()
    {
        Schema::create('l_pieces_table', function($table){
            $table->increments('id');
            $table->integer('ancho');
            $table->string('desc');
            $table->float('precio');
            $table->integer('tipo');
            $table->string('tipo_armario');
            $table->timestamps();
        });

        $b_piezas_int = array(
            array('id' => '1','ancho' => '400','desc' => 'trasera de 10 mm','precio' => '16.28','tipo' => '1', 'tipo_armario' => 'con_puertas'),
            array('id' => '2','ancho' => '500','desc' => 'trasera de 10 mm','precio' => '18.74','tipo' => '1', 'tipo_armario' => 'con_puertas'),
            array('id' => '3','ancho' => '600','desc' => 'trasera de 10 mm','precio' => '21.21','tipo' => '1', 'tipo_armario' => 'con_puertas'),
            array('id' => '4','ancho' => '700','desc' => 'trasera de 10 mm','precio' => '23.67','tipo' => '1', 'tipo_armario' => 'con_puertas'),
            array('id' => '5','ancho' => '800','desc' => 'trasera de 10 mm','precio' => '26.13','tipo' => '1', 'tipo_armario' => 'con_puertas'),
            array('id' => '6','ancho' => '900','desc' => 'trasera de 10 mm','precio' => '28.59','tipo' => '1', 'tipo_armario' => 'con_puertas'),
            array('id' => '7','ancho' => '1000','desc' => 'trasera de 10 mm','precio' => '31.06','tipo' => '1', 'tipo_armario' => 'con_puertas'),
            array('id' => '8','ancho' => '1100','desc' => 'trasera de 10 mm','precio' => '33.52','tipo' => '1', 'tipo_armario' => 'con_puertas'),
            array('id' => '9','ancho' => '1200','desc' => 'trasera de 10 mm','precio' => '35.98','tipo' => '1', 'tipo_armario' => 'con_puertas'),
            array('id' => '10','ancho' => '400','desc' => 'techo y rafix. sin pvc','precio' => '12.71','tipo' => '2', 'tipo_armario' => 'con_puertas'),
            array('id' => '11','ancho' => '500','desc' => 'techo y rafix. sin pvc','precio' => '13.32','tipo' => '2', 'tipo_armario' => 'con_puertas'),
            array('id' => '12','ancho' => '600','desc' => 'techo y rafix. sin pvc','precio' => '14.23','tipo' => '2', 'tipo_armario' => 'con_puertas'),
            array('id' => '13','ancho' => '700','desc' => 'techo y rafix. sin pvc','precio' => '15.76','tipo' => '2', 'tipo_armario' => 'con_puertas'),
            array('id' => '14','ancho' => '800','desc' => 'techo y rafix. sin pvc','precio' => '15.76','tipo' => '2', 'tipo_armario' => 'con_puertas'),
            array('id' => '15','ancho' => '900','desc' => 'techo y rafix. sin pvc','precio' => '17.94','tipo' => '2', 'tipo_armario' => 'con_puertas'),
            array('id' => '16','ancho' => '1000','desc' => 'techo y rafix. sin pvc','precio' => '18.75','tipo' => '2', 'tipo_armario' => 'con_puertas'),
            array('id' => '17','ancho' => '1100','desc' => 'techo y rafix. sin pvc','precio' => '19.55','tipo' => '2', 'tipo_armario' => 'con_puertas'),
            array('id' => '18','ancho' => '1200','desc' => 'techo y rafix. sin pvc','precio' => '20.36','tipo' => '2', 'tipo_armario' => 'con_puertas'),
            array('id' => '19','ancho' => '400','desc' => 'base y rafix. sin pvc','precio' => '12.12','tipo' => '3', 'tipo_armario' => 'con_puertas'),
            array('id' => '20','ancho' => '500','desc' => 'base y rafix. sin pvc','precio' => '12.73','tipo' => '3', 'tipo_armario' => 'con_puertas'),
            array('id' => '21','ancho' => '600','desc' => 'base y rafix. sin pvc','precio' => '13.65','tipo' => '3', 'tipo_armario' => 'con_puertas'),
            array('id' => '22','ancho' => '700','desc' => 'base y rafix. sin pvc','precio' => '15.17','tipo' => '3', 'tipo_armario' => 'con_puertas'),
            array('id' => '23','ancho' => '800','desc' => 'base y rafix. sin pvc','precio' => '15.17','tipo' => '3', 'tipo_armario' => 'con_puertas'),
            array('id' => '24','ancho' => '900','desc' => 'base y rafix. sin pvc','precio' => '17.05','tipo' => '3', 'tipo_armario' => 'con_puertas'),
            array('id' => '25','ancho' => '1000','desc' => 'base y rafix. sin pvc','precio' => '17.86','tipo' => '3', 'tipo_armario' => 'con_puertas'),
            array('id' => '26','ancho' => '1100','desc' => 'base y rafix. sin pvc','precio' => '18.91','tipo' => '3', 'tipo_armario' => 'con_puertas'),
            array('id' => '27','ancho' => '1200','desc' => 'base y rafix. sin pvc','precio' => '18.91','tipo' => '3', 'tipo_armario' => 'con_puertas'),
            array('id' => '28','ancho' => '400','desc' => 'balda altillo. rafix y pvc','precio' => '12.61','tipo' => '4', 'tipo_armario' => 'con_puertas'),
            array('id' => '29','ancho' => '500','desc' => 'balda altillo. rafix y pvc','precio' => '13.31','tipo' => '4', 'tipo_armario' => 'con_puertas'),
            array('id' => '30','ancho' => '600','desc' => 'balda altillo. rafix y pvc','precio' => '14.35','tipo' => '4', 'tipo_armario' => 'con_puertas'),
            array('id' => '31','ancho' => '700','desc' => 'balda altillo. rafix y pvc','precio' => '16.1','tipo' => '4', 'tipo_armario' => 'con_puertas'),
            array('id' => '32','ancho' => '800','desc' => 'balda altillo. rafix y pvc','precio' => '16.1','tipo' => '4', 'tipo_armario' => 'con_puertas'),
            array('id' => '33','ancho' => '900','desc' => 'balda altillo. rafix y pvc','precio' => '18.39','tipo' => '4', 'tipo_armario' => 'con_puertas'),
            array('id' => '34','ancho' => '1000','desc' => 'balda altillo. rafix y pvc','precio' => '19.32','tipo' => '4', 'tipo_armario' => 'con_puertas'),
            array('id' => '35','ancho' => '1100','desc' => 'balda altillo. rafix y pvc','precio' => '20.52','tipo' => '4', 'tipo_armario' => 'con_puertas'),
            array('id' => '36','ancho' => '1200','desc' => 'balda altillo. rafix y pvc','precio' => '20.52','tipo' => '4', 'tipo_armario' => 'con_puertas'),
            array('id' => '37','ancho' => '0','desc' => 'costado_int','precio' => '32.91','tipo' => '5', 'tipo_armario' => 'con_puertas'),
            array('id' => '38','ancho' => '0','desc' => 'costado_ext','precio' => '29.05','tipo' => '6', 'tipo_armario' => 'con_puertas'),
            array('id' => '1','ancho' => '400','desc' => 'trasera de 10 mm','precio' => '16.28','tipo' => '1', 'tipo_armario' => 'sin_puertas'),
            array('id' => '2','ancho' => '500','desc' => 'trasera de 10 mm','precio' => '18.74','tipo' => '1', 'tipo_armario' => 'sin_puertas'),
            array('id' => '3','ancho' => '600','desc' => 'trasera de 10 mm','precio' => '21.21','tipo' => '1', 'tipo_armario' => 'sin_puertas'),
            array('id' => '4','ancho' => '700','desc' => 'trasera de 10 mm','precio' => '23.67','tipo' => '1', 'tipo_armario' => 'sin_puertas'),
            array('id' => '5','ancho' => '800','desc' => 'trasera de 10 mm','precio' => '26.13','tipo' => '1', 'tipo_armario' => 'sin_puertas'),
            array('id' => '6','ancho' => '900','desc' => 'trasera de 10 mm','precio' => '28.59','tipo' => '1', 'tipo_armario' => 'sin_puertas'),
            array('id' => '7','ancho' => '1000','desc' => 'trasera de 10 mm','precio' => '31.06','tipo' => '1', 'tipo_armario' => 'sin_puertas'),
            array('id' => '8','ancho' => '1100','desc' => 'trasera de 10 mm','precio' => '33.52','tipo' => '1', 'tipo_armario' => 'sin_puertas'),
            array('id' => '9','ancho' => '1200','desc' => 'trasera de 10 mm','precio' => '35.98','tipo' => '1', 'tipo_armario' => 'sin_puertas'),
            array('id' => '10','ancho' => '400','desc' => 'techo y rafix. sin pvc','precio' => '14.74','tipo' => '2', 'tipo_armario' => 'sin_puertas'),
            array('id' => '11','ancho' => '500','desc' => 'techo y rafix. sin pvc','precio' => '15.48','tipo' => '2', 'tipo_armario' => 'sin_puertas'),
            array('id' => '12','ancho' => '600','desc' => 'techo y rafix. sin pvc','precio' => '16.58','tipo' => '2', 'tipo_armario' => 'sin_puertas'),
            array('id' => '13','ancho' => '700','desc' => 'techo y rafix. sin pvc','precio' => '18.43','tipo' => '2', 'tipo_armario' => 'sin_puertas'),
            array('id' => '14','ancho' => '800','desc' => 'techo y rafix. sin pvc','precio' => '18.43','tipo' => '2', 'tipo_armario' => 'sin_puertas'),
            array('id' => '15','ancho' => '900','desc' => 'techo y rafix. sin pvc','precio' => '20.86','tipo' => '2', 'tipo_armario' => 'sin_puertas'),
            array('id' => '16','ancho' => '1000','desc' => 'techo y rafix. sin pvc','precio' => '21.84','tipo' => '2', 'tipo_armario' => 'sin_puertas'),
            array('id' => '17','ancho' => '1100','desc' => 'techo y rafix. sin pvc','precio' => '22.82','tipo' => '2', 'tipo_armario' => 'sin_puertas'),
            array('id' => '18','ancho' => '1200','desc' => 'techo y rafix. sin pvc','precio' => '23.80','tipo' => '2', 'tipo_armario' => 'sin_puertas'),
            array('id' => '19','ancho' => '400','desc' => 'base y rafix. sin pvc','precio' => '14.15','tipo' => '3', 'tipo_armario' => 'sin_puertas'),
            array('id' => '20','ancho' => '500','desc' => 'base y rafix. sin pvc','precio' => '14.89','tipo' => '3', 'tipo_armario' => 'sin_puertas'),
            array('id' => '21','ancho' => '600','desc' => 'base y rafix. sin pvc','precio' => '16.00','tipo' => '3', 'tipo_armario' => 'sin_puertas'),
            array('id' => '22','ancho' => '700','desc' => 'base y rafix. sin pvc','precio' => '17.84','tipo' => '3', 'tipo_armario' => 'sin_puertas'),
            array('id' => '23','ancho' => '800','desc' => 'base y rafix. sin pvc','precio' => '17.84','tipo' => '3', 'tipo_armario' => 'sin_puertas'),
            array('id' => '24','ancho' => '900','desc' => 'base y rafix. sin pvc','precio' => '19.97','tipo' => '3', 'tipo_armario' => 'sin_puertas'),
            array('id' => '25','ancho' => '1000','desc' => 'base y rafix. sin pvc','precio' => '20.95','tipo' => '3', 'tipo_armario' => 'sin_puertas'),
            array('id' => '26','ancho' => '1100','desc' => 'base y rafix. sin pvc','precio' => '21.93','tipo' => '3', 'tipo_armario' => 'sin_puertas'),
            array('id' => '27','ancho' => '1200','desc' => 'base y rafix. sin pvc','precio' => '22.91','tipo' => '3', 'tipo_armario' => 'sin_puertas'),
            array('id' => '28','ancho' => '400','desc' => 'balda altillo. rafix y pvc','precio' => '13.35','tipo' => '4', 'tipo_armario' => 'sin_puertas'),
            array('id' => '29','ancho' => '500','desc' => 'balda altillo. rafix y pvc','precio' => '14.09','tipo' => '4', 'tipo_armario' => 'sin_puertas'),
            array('id' => '30','ancho' => '600','desc' => 'balda altillo. rafix y pvc','precio' => '15.20','tipo' => '4', 'tipo_armario' => 'sin_puertas'),
            array('id' => '31','ancho' => '700','desc' => 'balda altillo. rafix y pvc','precio' => '17.04','tipo' => '4', 'tipo_armario' => 'sin_puertas'),
            array('id' => '32','ancho' => '800','desc' => 'balda altillo. rafix y pvc','precio' => '17.04','tipo' => '4', 'tipo_armario' => 'sin_puertas'),
            array('id' => '33','ancho' => '900','desc' => 'balda altillo. rafix y pvc','precio' => '19.47','tipo' => '4', 'tipo_armario' => 'sin_puertas'),
            array('id' => '34','ancho' => '1000','desc' => 'balda altillo. rafix y pvc','precio' => '20.45','tipo' => '4', 'tipo_armario' => 'sin_puertas'),
            array('id' => '35','ancho' => '1100','desc' => 'balda altillo. rafix y pvc','precio' => '21.73','tipo' => '4', 'tipo_armario' => 'sin_puertas'),
            array('id' => '36','ancho' => '1200','desc' => 'balda altillo. rafix y pvc','precio' => '21.73','tipo' => '4', 'tipo_armario' => 'sin_puertas'),
            array('id' => '37','ancho' => '0','desc' => 'costado_int','precio' => '32.91','tipo' => '5', 'tipo_armario' => 'sin_puertas'),
            array('id' => '38','ancho' => '0','desc' => 'costado_ext','precio' => '32.91','tipo' => '6', 'tipo_armario' => 'sin_puertas')
        );

        foreach ($b_piezas_int as $pieza) {
            DB::table('l_pieces_table')->insert(array(
                'ancho' => $pieza["ancho"],
                'desc' => $pieza["desc"],
                'precio' => $pieza["precio"],
                'tipo' => $pieza["tipo"],
                'tipo_armario' => $pieza["tipo_armario"],
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
        Schema::drop('l_pieces_table');
    }

}