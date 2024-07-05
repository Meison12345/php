<?php

error_reporting(~0);
ini_set('display_errors', 1);

interface iFile
{
    public function __construct($filePath);
    
    public function getPath(); // путь к файлу
    public function getDir();  // папка файла
    public function getName(); // имя файла
    public function getExt();  // расширение файла
    public function getSize(); // размер файла
    
    public function getText();          // получает текст файла
    public function setText($text);     // устанавливает текст файла
    public function appendText($text);  // добавляет текст в конец файла
    
    public function copy($copyPath);    // копирует файл
    public function rename($newName);   // переименовывает файл
    public function replace($newPath);  // перемещает файл
    public function delete();           // удаляет файл
}

class File implements iFile
{
    private $filePath;

    public function __construct($filePath)
    {
        $this->filePath = $filePath;
    }

    public function getPath()
    {
        return $this->filePath;
    }

    public function getDir()
    {
        return dirname($this->filePath);
    }

    public function getName()
    {
        return basename($this->filePath);
    }

    public function getExt()
    {
        return pathinfo($this->filePath, PATHINFO_EXTENSION);
    }

    public function getSize()
    {
        // echo filesize($this->filePath);
        return filesize($this->filePath);
        
        // if (file_exists($this->filePath)) {
        //     $fileInfo = new SplFileInfo($this->filePath);
        //     return $fileInfo->getSize();
        // } else {
        //     throw new Exception("Файл не найден: " . $this->filePath);
        // }
    }

    public function getText()
    {
        // var_dump(file_get_contents($this->filePath));
        return file_get_contents($this->filePath);
    }

    public function setText($text)
    {
        file_put_contents($this->filePath, $text);
    }

    public function appendText($text)
    {
        file_put_contents($this->filePath, $text, FILE_APPEND);
    }

    public function copy($copyPath)
    {
        copy($this->filePath, $copyPath);
    }

    public function delete()
    {
        unlink($this->filePath);
    }

    public function rename($newName)
    {
        $newPath = $this->getDir() . DIRECTORY_SEPARATOR . $newName;
        rename($this->filePath, $newPath);
        $this->filePath = $newPath;
    }

    public function replace($newPath)
    {
        rename($this->filePath, $newPath);
        $this->filePath = $newPath;
    }
}

// Пример использования класса:
$file = new File("example.txt");
var_dump($file);

// Получение информации о файле
echo $file->getPath() . PHP_EOL;
echo $file->getDir() . PHP_EOL;
echo $file->getName() . PHP_EOL;
echo $file->getExt() . PHP_EOL;
print_r($file->getSize()) . PHP_EOL;

// Работа с содержимым файла
echo $file->getText() . PHP_EOL;
$file->setText("AAAA");
$file->appendText("\nДобавляю текст в файл");

// Копирование, переименование и удаление файла
$file->copy('example_copy.txt');
$file->rename('переименованный файл.txt');
$file->replace('test/example_renamed.txt');
$file->delete();
?>
