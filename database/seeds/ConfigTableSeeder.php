<?php

use Illuminate\Database\Seeder;
use App\Models\Commons\Config;

class ConfigTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    //php artisan db:seed --class=ConfigTableSeeder

	    $this->command->info( 'SET PAGCHAIN-TOKEN' );
	    $config               = new Config();
	    $config->field        = 'pagchain-token';
	    $config->field_type   = 'text';
	    $config->field_name   = 'Token do Pagchain';
	    $config->value        = NULL;
//	    $config->value        = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyIjp7Il9pZCI6IjVhOGMyZGVhY2Q1NGMxNGJhMjY3Y2NmMSIsInVzZXJJZCI6InpGcnpmbWdCQVVuaXF0WGNpWTRKQWE1RndaM1hib1hHIiwiYWRkcmVzcyI6IjE1R1NjS1JCdHRMNTRYTDIyTFNCdFlMdnZ2ZEF4SjVGR0czODdTIiwiY2VsbFBob25lIjoiNTUyMTAwMDAwMDAwMCIsImRhdGUiOiIyMDE4LTAyLTIwVDE0OjE3OjE0LjIyNVoiLCJkYXRlVGltZSI6IjIvMjAvMjAxOCIsImlzQWN0aXZlIjp0cnVlLCJ0aW1lIjoiMjoxNzoxNCBQTSIsInVzZXJFbWFpbCI6InRlc3RAdGVzdC5jb20iLCJ1c2VyRmlyc3ROYW1lIjoiRGlvZ28iLCJ1c2VyTGFzdE5hbWUiOiJTb3V6YSIsInVzZXJSb2xlIjo1fSwiY29tcGFueSI6eyJfaWQiOiI1OWVlN2FjNmVhOGY1NTdiODNlOWJjMmMiLCJjb21wYW55SWQiOiJsZ1RVWnA2QjlqUU5lM0JieXhiVUVKU2JkWnhLYmJDeSIsImNvbXBhbnlOYW1lIjoiUEFHQ0hBSU4gVEVDTk9MT0dJQSBFIFNPTFVDT0VTIEVNIEJMT0NLQ0hBSU4gTFREQSAiLCJkYXRlIjoiMTAvMjMvMjAxNyIsImlzQWN0aXZlIjpmYWxzZSwidGltZSI6IjExOjI3OjAyIFBNIiwidG9rZW4iOiJmZThiMGVjMjY0ZDllZGI2YWNhZjgyMzQ2OWJmMTQ4M2FhODQ3ZjAyZTEzNTNjYmViZWRlYWJhMThjYzhkMzU2In0sImlhdCI6MTUxOTg0MDk0Mn0.T7zJezBQ2wMEU5dPSC0Qj6jCeOYh5hqBO4pNft-hdko';
	    $config->save();


	    $this->command->info( 'SET ASSETNAME' );
	    $config               = new Config();
	    $config->field        = 'pagchain-asset-name';
	    $config->field_type   = 'text';
	    $config->field_name   = 'Nome do Asset';
	    $config->value        = '{"name":"DocumentRegister","address":""}'; // optional
	    $config->save();

    }
}
