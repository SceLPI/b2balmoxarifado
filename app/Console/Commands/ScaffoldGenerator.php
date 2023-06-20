<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Doctrine\DBAL\Schema\Table;
use Illuminate\Support\Str;

class ScaffoldGenerator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:scaffold {table}
                                {--modelname= : Name of Model }
                                {--overwritemodel= : Overwrite Model }
                                {--controllername= : Name of Controller }
                                {--overwritecontroller= : Overwrite Controller }
                                {--overwriterepository= : Overwrite Repository }
                            ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create simple scaffold of desired table.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $table = $this->argument('table');

        $schema = DB::getDoctrineSchemaManager();
        $details = $schema->introspectTable($table);

        $this->checkController($details);
        $this->checkModel($details);
        $this->createViews($details);
    }

    private function checkRepository(Table $details, string $baseName) {
        $repositoryName = $baseName . "Repository";

        $repositoryFolder = base_path() . DIRECTORY_SEPARATOR ."app" . DIRECTORY_SEPARATOR ."Http" .
                                DIRECTORY_SEPARATOR . "Repositories";
        $repositoryPath = $repositoryFolder . DIRECTORY_SEPARATOR . $repositoryName . ".php";

        if ( !file_exists($repositoryFolder) ) {
            mkdir( $repositoryFolder );
        }

        if ( !file_exists($repositoryPath) || $this->option('overwritecontroller') == true ) {

            $file = fopen( $repositoryPath, "w+");

            $content = "<?php\n\n";
            $content .= "namespace App\Http\Repositories;\n";
            $content .= "use App\Models\\" . $baseName . ";\n\n";
            $content .= "class " . $repositoryName . " extends Repository\n";
            $content .= "{\n\n";
            $content .= "\t\tpublic function __construct() {\n";
            $content .= "\t\t\t\$this->model = new " . $baseName . ";\n";
            $content .= "\t\t}\n\n";
            $content .= "\t\tpublic function saveFromRequest() : " . $baseName . " {\n";
            foreach( $details->getColumns() as $column ) {
                if ( $column->getAutoincrement() ) {
                    continue;
                }
                if ( $column->getDefault() || $column->getNotnull() ) {
                    $columnName = $column->getName();
                    $content .= "\t\t\tif ( \$" . $columnName . " = request()->get('" . $columnName . "') ) {\n";
                    $content .= "\t\t\t\t\$this->model->" . $columnName . " = \$" . $columnName . ";\n";
                    $content .= "\t\t\t} else if ( !\$this->model->" . $columnName . " ) {\n";
                    $content .= "\t\t\t\tabort(400, \"" . $columnName . " cannot be null.\");\n";
                    $content .= "\t\t\t}\n";
                } else if ( !$column->getDefault() || !$column->getNotnull() ) {
                    $columnName = $column->getName();
                    $content .= "\t\t\tif ( \$" . $columnName . " = request()->get('" . $columnName . "') ) {\n";
                    $content .= "\t\t\t\t\$this->model->" . $columnName . " = \$" . $columnName . ";\n";
                    $content .= "\t\t\t}\n";
                }
            }
            $content .= "\t\t\treturn \$this->model;\n";
            $content .= "\t\t}\n\n";
            $content .= "}\n";

            fwrite($file, $content);

        }
        dd( $repositoryPath );
    }

    private function checkController(Table $details) {

        $controllerName = $this->option('controllername');

        if ( !$controllerName ) {
            $controllerName =  Str::singular($details->getName());
            $controllerName = $this->snakeToCamelCase( $controllerName );
        }

        $baseName = $controllerName;

        $this->checkRepository($details, $baseName);

        $controllerName .= "Controller";

        $controllerPath = base_path() . DIRECTORY_SEPARATOR ."app" . DIRECTORY_SEPARATOR ."Http" .
                                DIRECTORY_SEPARATOR . "Controllers" .
                                DIRECTORY_SEPARATOR . $controllerName . ".php";

        if ( !file_exists( $controllerPath ) || $this->option('overwritecontroller') == true ) {
            $file = fopen(  $controllerPath, "w+" );

            $content = "<?php\n\n";
            $content .= "namespace App\Http\Controllers\Backend;\n\n";
            $content .= "use App\Http\Controllers\Controller;\n";
            $content .= "use App\Http\Repositories\\" . $baseName . "Repository;\n\n";
            $content .= "class " . $controllerName . " extends Controller\n";
            $content .= "{\n\n";
            $content .= "\t\tpublic function __construct() {\n";
            $content .= "\t\t\t\$this->repository = new " . $baseName . "Repository();\n";
            $content .= "\t\t}\n\n";
            $content .= "}";

            fwrite($file, $content );

        } else {
            dd( "Controller already exists" );
        }

        dd( $controllerName);

    }

    private function checkModel(Table $details) {

        $modelName = $this->option('modelname');

        if ( !$modelName ) {
            $modelName =  Str::singular($details->getName());
            $modelName = $this->snakeToCamelCase( $modelName );
        }

        if ( !file_exists(base_path() . DIRECTORY_SEPARATOR ."app" . DIRECTORY_SEPARATOR ."Models" . DIRECTORY_SEPARATOR . $modelName . ".php" )
                || $this->option('overwritemodel') == true ) {

            echo "Model " . base_path() . DIRECTORY_SEPARATOR ."app" .
                  DIRECTORY_SEPARATOR ."Models" . DIRECTORY_SEPARATOR .
                  $modelName . ".php created.";

            $file = fopen(  base_path() . DIRECTORY_SEPARATOR ."app" .
            DIRECTORY_SEPARATOR ."Models" . DIRECTORY_SEPARATOR .
            $modelName . ".php", "w+" );

            $content = "<?php\n\n";
            $content .= "namespace App\Models;\n\n";
            $content .= "use Illuminate\Database\Eloquent\Factories\HasFactory;\n";
            $content .= "use Illuminate\Database\Eloquent\Model;\n\n";
            $content .= "class " . $modelName . " extends Model\n";
            $content .= "{\n";
            $content .= "\tuse HasFactory;\n\n";
            $content .= "\tprotected \$table = \"" . $details->getName() . "\";\n\n";

            $foreigns = $details->getForeignKeys();

            foreach( $foreigns as $foreign ) {

                $model = $this->snakeToCamelCase( Str::singular($foreign->getForeignTableName()));
                if ( !file_exists(base_path() . DIRECTORY_SEPARATOR ."app" . DIRECTORY_SEPARATOR ."Models" . DIRECTORY_SEPARATOR . $model . ".php")) {
                    $modelResponse = $this->ask("Model " . $model . " not found, what you want to do? [Y]es, [N]o or Type the name of Model.");
                    if ( strtoupper($modelResponse) == "Y" ) {
                        $this->call('generate:scaffold', [ "table" => $foreign->getForeignTableName() ]);
                    } else if ( strtoupper($modelResponse) == "N" ) {
                        $this->info("Skipping model creation, but all refereces was created");
                    } else if ( $modelResponse ) {
                        $model = $modelResponse;
                    }
                }

                $content .= "\tpublic function " . $foreign->getForeignTableName() . "()\n";
                $content .= "\t{\n";
                $content .= "\t\treturn \$this->belongsTo(" .
                    $model .
                    "::class, \"" . $foreign->getForeignColumns()[0] .
                    "\", \"" . $foreign->getLocalColumns()[0] . "\"); \n";
                $content .= "\t}\n";
            }

            $content .= "}\n";

            fwrite( $file, $content);

        } else {
            echo "The model " . base_path() . DIRECTORY_SEPARATOR ."app" .
                  DIRECTORY_SEPARATOR ."Models" . DIRECTORY_SEPARATOR .
                  $modelName . ".php already exists.";
        }
    }


    private function snakeToCamelCase(string $name) : string {
        $name = str_replace("_", " ", $name);
        $name = ucwords($name);
        $name = str_replace(" ", "", $name);
        return $name;
    }

    private function createViews(Table $details) {

        $table = $details->getName();

        if (!file_exists(base_path() . '/resources/views/' . $table )) {
            mkdir(base_path() . '/resources/views/' . $table);
        }

        $index = fopen(base_path() . '/resources/views/' .  $table . "/index.blade.php", "w+");
        $form = fopen(base_path() . '/resources/views/' .  $table . "/form.blade.php", "w+");

        $this->createIndex($details, $index);
        $this->createForm($details, $form);
    }

    private function createIndex(Table $details, $file) {
    }

    private function createForm(Table $details, $file) {
        $columns = $details->getColumns();
        $foreigns = $details->getForeignKeys();

        $skipForeigns = [];
        $columnsToBuild = [];

        foreach( $foreigns as $name => $foreign ) {
            $localColumn = $foreign->getLocalColumns()[0];
            $skipForeigns[$localColumn] = [
                "references" => $foreign->getForeignColumns()[0],
                "on" => $foreign->getForeignTableName(),
            ];
        }

        foreach( $columns as $name => $column ) {
            if ( in_array($name, array_keys($skipForeigns) ) ) {
                $columnsToBuild[] = [
                    "name" => $skipForeigns[$name]["on"],
                    "required" => $column->getNotnull() && !($column->getDefault() || $column->getAutoincrement()),
                    "isForeign" => true,
                    "localColumn" => $name,
                ];
                continue;
            }
            $columnsToBuild[] = [
                "name" => $name,
                "required" => $column->getNotnull() && !($column->getDefault() || $column->getAutoincrement()),
                "length" => $column->getLength(),
                "isForeign" => false,
            ];
        }

        $content = "@extends('layout.template')\n";
        $content .= "@section('content')\n\n";
        $content .= "<form method='post'>\n";
        $content .= "@csrf_field\n";
        $content .= "<div class='row'>\n";

        foreach( $columnsToBuild as $columnToBuild) {

            $content .= "\t<div class='col-12'>\n";
            $content .= "\t\t<div class='mb-3'>\n";
            $content .= "\t\t\t<label for='" . $columnToBuild["name"] . "' class='form-label'>" . $columnToBuild["name"] . "</label>\n";

            if ( $columnToBuild["isForeign"] ) {
                $content .= "\t\t\t<select class='form-control' id='" . $columnToBuild["localColumn"] .
                "' name='" . $columnToBuild["localColumn"] . "'>\n";
                $content .= "\t\t\t\t<option value=''>-- SELECIONE --</option>\n";
                $content .= "\t\t\t\t@foreach (\$model->" . $columnToBuild["name"] . " as \$relationshipModel )\n";
                $content .= "\t\t\t\t\t<option @if (\$relationshipModel->id == \$model->" . $columnToBuild["localColumn"] . ") selected  @endif value='{{ \$relationshipModel->id }}'>{{ \$relationshipModel->name }}</option>\n";
                $content .= "\t\t\t\t@endforeach\n";
                $content .= "\t\t\t</select>\n";
            } else {
                $content .= "\t\t\t<input class='form-control' id='" . $columnToBuild["name"] .
                "' name='" . $columnToBuild["name"] . "' value='{{ \$model->" . $columnToBuild["name"] . " }}'>\n";
            }

            $content .= "\t\t<div>\n";
            $content .= "\t</div>\n";
        }

        $content .= "</div>\n\n";
        $content .= "@endsection";

        fwrite($file, $content);
        fclose($file);
    }
}
