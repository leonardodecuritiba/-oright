<?php

use Illuminate\Database\Seeder;
use \App\Models\Works\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
	    $categories = [
	    	[
		        'title' => 'Projetos Criativos',
			    'descriptions' => 'peças publicitárias, layouts, logotipos e etc'
		    ],
	    	[
		        'title' => 'Projetos Técnicos',
			    'descriptions' => 'projetos arquiteturais, peças de design e de engenharia'
		    ],
	    	[
		        'title' => 'Projetos Culturais',
			    'descriptions' => 'eventos, festivais, shows'
		    ],
	    	[
		        'title' => 'Obras de Arte',
			    'descriptions' => 'pinturas, fotografias e esculturas'
		    ],
	    	[
		        'title' => 'Projetos de Consultoria',
			    'descriptions' => 'planos de negócios, apresentações comerciais e etc'
		    ],
	    	[
		        'title' => 'Trabalhos',
			    'descriptions' => 'acadêmicos e pesquisas científicas e todo o tipo de criação'
		    ],
	    ];
	    foreach($categories as $category){
	    	Category::create($category);
	    }
    }
}
