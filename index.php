<!DOCTYPE html>
<html>
<body>
<h1><center>ARC Project by Benjamin Akindote</center></h1>
<hr><br>
<?php
class MovieCollection {
  // Properties
  public $title;
  public $runtime;
  public $releaseDate;
  public $actors;

  //constructor function
  function __construct($title, $runtime, $releaseDate)  {
    $this->title = $title;
    $this->runtime = $runtime;
    $this->releaseDate = $releaseDate;
}

  // -------- Title Method
  function set_title($title) {
    $this->title = $title;
  }
  function get_title() {
    return $this->title;
  }

  //----------- Runtime method
  function set_runtime($runtime) {
    $this->runtime = $runtime;
  }
  function get_runtime() {
    return $this->runtime;
  }

  //------------- Release-Date method
  function set_releaseDate($releaseDate) {
    $this->releaseDate = $releaseDate;
  }
  function get_releaseDate() {
    return $this->releaseDate;
  }

  //---------- Actors method
  function set_actors($actors) {
    $this->actors = $actors;
  }

  //list actors by default
  function get_actors() {
    $actors = $this->actors;

    $actors_results="";

    for($x=0;$x<3;$x++){
        $actors_results.= "Name: ".$actors[$x][0]. "<br> Date of Birth: ".$actors[$x][1]."<br> Character: ".$actors[$x][2]."<br><br>"; 
    }

    return $actors_results;
  }



  //actors by descending age
  function get_actors_desc() {
    $actors = $this->actors;
    
    //sort age by descending order
    function date_compare($a, $b)
    {
        $t1 = strtotime($a[1]);
        $t2 = strtotime($b[1]);
        return $t1 - $t2;
    } 

    usort($actors, 'date_compare');

    $actors_results="";

    foreach($actors as $actor => $row){
        $actors_results.= "Name: ".$row[0]. "<br> Date of Birth: ".$row[1]."<br> Character: ".$row[2]."<br><br>"; 
    }

    

    return $actors_results;

  }

  //------------- method that returns movie data as JSON.
  function movie_data_json(){
    return json_encode($this);
  }
}


//Movie 1
$movie1 = new MovieCollection('Wolf of Wall Street', '2h 59m', '2013');
$movie1->set_actors(array(
    array('Jonah Hill','1983-09-20','Donnie Azoff'),
    array('Leonardo Dicarprio','1974-11-11','Jordan Belfort'),
    array('Margot Robbie','1990-07-02','Naomi Lapaglia')
));

$movie2 = new MovieCollection('Avengers: Endgame', '3h 2m', '2019');
$movie2->set_actors(array(
    array('Robert Downey Jr.','1965-04-04','Iron Man'),
    array('Chris Evans','1981-06-13','Captain America'),
    array('Chris Hemsworth','1983-08-11','Thor')
));

$movie3 = new MovieCollection('The Social Network', '2h 34m', '2010');
$movie3->set_actors(array(
    array('Jesse Eisenberg','1983-10-05','Mark Zuckerberg'),
    array('Andrew Garfield','1983-08-20','Eduardo Saverin'),
    array('Justin Timberlake','1981-01-31','Sean Parker')
));


//display Movie Title
echo "<br><br><b>Movie Title:</b> " . $movie1->get_title()."<br>";

//display Movie Runtime
echo "<b>Runtime:</b> " . $movie1->get_runtime()."<br>";

//display Movie Release Date
echo "<b>Release Date:</b> " . $movie1->get_releaseDate()."<br>";

echo "<br><br>";


//show movie json data
$json_result=$movie1->movie_data_json();
echo "<b>The JSON representation is:</b> ".$json_result;



//display Movie Actors by descending age
echo "<br><br><b>Actors ordered by descending age:</b> <br>";

$actors = $movie1->get_actors_desc();
echo $actors;


//EXTRA--- Decode Movie Data into PHP object
echo "<br><b>Decoding the JSON data format into a PHP object(extra):</b>"."\n";
   $decoded = json_decode($json_result);
   var_dump($decoded);


?>
 
</body>
</html>
