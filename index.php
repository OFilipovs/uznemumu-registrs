<?php

require_once "vendor/autoload.php";
const DATA = "register.csv";
$choices = [" Atlasīt pēdējos 30 uzņēmumus: ", " Meklēt uznēmumu pēc nosaukuma ", " Meklēt uznēmumu pēc nosaukuma reg.-nr.", " Iziet"];
$file = new \App\Csv(DATA);
$companies = new \App\CompaniesList();
foreach ($file->getRecords() as $record){
    $companies->setList(new \App\Company($record["name"], $record["regcode"]));
}

function display($company): string {
    if ($company instanceof \App\Company){
        return $company->getName() . " " . $company->getRegNum() . PHP_EOL;
    } else {
        return $company;
    }
}

$userInput = 6;

while ($userInput != 3){
    foreach ($choices as $key => $choice) {
        echo $key . $choice . PHP_EOL;
    }
    $userInput = (int)readline(" Jūsu izvēle: ");
    switch ($userInput){
        case 0:
            foreach($companies->last30() as $company){
                echo display($company);
            };
            break;
        case 1:
            $name = readline(" Ievadiet uzņēmuma nosaukumu ");
            echo display($companies->searchByName($name));
            break;
        case 2:
            $name =  strval(readline(" Ievadiet uzņēmuma reg.-nr. "));
            echo display($companies->searchByReg($name));
            break;
        case 3:
            echo "Visu labu! " . PHP_EOL;
            exit;
    }
}




//foreach ($file->getRecords() as $record){
//    $companies[] = $record["name"];
//}
//
//var_dump($companies);



//$new = Reader::createFromStream(fopen(DATA, "r"));
//$new->setHeaderOffset(0);
//$records = $new->getRecords();
//foreach ($records as $offset => $record) {
//    var_dump($record);
//}

// paradit pedejos 30 ierkastus, opcija - meklet pec nosaukuma, reg nr, league csv, php generator,
// datu pajautasana un datu izvadisana, objekts kompanija, objekts csv