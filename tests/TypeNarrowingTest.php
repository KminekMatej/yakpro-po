<?php

namespace Obfuscator\Test;

final class TypeNarrowingTest extends TestAbstract
{

    protected static function getSourcesDir(): string
    {
        return "TypesNarrowing";
    }

    //Run obsfusction to be able to run tests comparing original and obfuscated files
    public static function setUpBeforeClass(): void
    {
        parent::setUpBeforeClass();
        parent::obfuscateSources();
    }

    public function testInterfacedClassObfuscated()
    {
        $original = parent::getParsedFile(self::$sourcesDir . "/Fooer.php");
        $obfuscated = parent::getParsedFile(self::$obfuscatedDir . "/Fooer.php");

        parent::dumpNode($original[0]->stmts[1]->stmts[0]);
        /*
        //namespace obfuscation checks
        $this->assertObfuscated($original[0]->name->parts[0], $obfuscated[0]->name->parts[0]); //Obfuscator
        $this->assertObfuscated($original[0]->name->parts[1], $obfuscated[0]->name->parts[1]); //Test

        //class name obfuscation checks
        $this->assertObfuscated($original[0]->stmts[0]->name->name, $obfuscated[0]->stmts[0]->name->name);

        //function file shouldnt be obfuscated
        $this->assertEquals((string) $original[0]->stmts[0]->stmts[0]->stmts[0]->expr->expr->name, (string) $obfuscated[0]->stmts[0]->stmts[0]->stmts[0]->expr->expr->name);*/
    }
}
