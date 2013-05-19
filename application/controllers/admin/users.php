<?php

class Admin_Users_Controller extends Admin_Controller {

	public $restful = true;
	public $views = 'users';

	protected $valid_filters = array(
        'id',
        'empresa',
        'coupon',
        'nombre_com',
        'created'
    );


	public function get_index()
	    {
	    	// Ordering stuff when filtering in url's.
	        //
	        $orderBy   = ( in_array( strtolower( Input::get('orderBy') ), $this->valid_filters ) ) ? Input::get('orderBy') : 'id';
	        $orderType = ( in_array( strtoupper( Input::get('orderType') ), array('ASC', 'DESC') ) ) ? strtoupper( Input::get('orderType') ) : 'ASC';
	        $perPage   = Input::get('perPage', 25);
	        $filter    = array();

			// Pagination links setup.

			$pagination = array(
			   'perPage'   => $perPage,
			   'orderBy'   => $orderBy,
               'orderType' => $orderType,
			);

			// Search Filter.
	        //
	        foreach( $this->valid_filters as $_filter ):
	            // Do we have this filter on the $_GET array ?
	            //
	            if ( $data = Input::get( $_filter ) ):
	                $pagination[ $_filter ] = $data;
	                $filter[ $_filter ]     = $data;
	            endif;
	        endforeach;
	        // Get the list of countries.
	        //
	        $query = Distributors::order_by( $orderBy, $orderType )/*->where('id','>',200)*/;

	        // Search filter.
	        //
	        if ( ! is_null( $filter ) or ! empty( $filter ) ):
	            // Loop through the filters.
	            //
	            foreach( $filter as $item => $value ):
	                $query->where( $item, 'LIKE', '%' . $value . '%' );
	            endforeach;
	        endif;

			$dists = $query->paginate( $perPage );
			$dists->appends( $pagination )->links();


	    	//$total= Distributors::order_by('id','asc')->count();
	    	//$dists_pag = Paginator::make($dists, $total, $per_page);
	    	$this->data[$this->views] = $dists;

	        return View::make('admin.'.$this->views,$this->data)
		        ->with('title','Administra los distribuidores');
	    }
}

