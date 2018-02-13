				<?php

			/**
			* 
			*/
			class Product_Store 
			{
				    public  $product_name;
					public $product_quantity;
					public $totalbalance;
				function __construct($product_name,$product_quantity,$totalbalance)
				{
					$this->product_name = $product_name;
					$this->product_quantity = $product_quantity;
					$this->totalbalance = $totalbalance;
				}
			}

				?>