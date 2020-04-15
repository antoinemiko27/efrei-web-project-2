<html>
<head>
<title>Text manager</title>
<link rel="stylesheet" href="https://unpkg.com/mustard-ui@latest/dist/css/mustard-ui.min.css">

</head>
<body>

<header style="height: 200px;">
<h1>Text manager</h1>
</header>
<br>
<div class="row">
    <div class="col col-sm-5">


      <?php
      $NewLink;
      $keywords;
      ?>


        <div class="panel">
            <div class="panel-body">



                <h2>1. Get text </h2>

                <form action="TextManager.php" method="post">
                    <input type="text" name="link" value="<?=$NewLink?>">
                    <br><input type="submit" value="Fetch Text"></br>


                <h2>2. Find keywords</h2>


                    <input type="text" name="key" value="<?=$keywords?>">
                    <br><input type="submit" value="Search text"></br>
                </form>

                <h2>3. Check results </h2>


                <?php

                if (isset($_POST['key'])){
                    $keywords = $key = $_POST['key'];




                    if (isset($_POST['link'])) {

                        $NewLink = $_POST['link'];
                        $text = file_get_contents($NewLink);
                        $keywords = preg_split('/\s+/', "$keywords");
                        $numberword=0;

                        for($i=0 ; $i < count($keywords); $i++){
                          $pos = 0;
                          $posword = array();
                          $position = stripos($text, $keywords[$i], $pos);
                          $number=0;

                          while($position != FALSE) {
                            $number++;
                            $remplacement = "<mark id=\"$keywords[$i]-$number\">$keywords[$i]</mark>";
                            $text = substr_replace($text, $remplacement, $position, strlen($keywords[$i]));

                            array_push($posword, $position);
                            $pos = $position + strlen($remplacement);
                            $position = stripos($text, $keywords[$i], $pos);
                          }

                          $z=0;
                          while($z <= count($posword)){
                            $z++;
                          }
                          $z =$z -1;

                          echo "($z)  ";
                          echo "Keyword : ";
                          echo "$key";
                          echo "</br>";

                          for($x =1; $x <= count($posword); $x++){
                            $y= $x-1;


                            echo " ";
                            echo "<a href= '#$keyword[$i] - $x' >$x</a>";
                            echo " ";

                          }

                          array_push($numberword, $posword);
                        }
                      }
                    }
                    ?>


            </div>
        </div>
    </div>

    <div class="col col-sm-7" style="padding-left: 25px;">
      <pre><code>

        <?php

        echo "$text";

         ?>



      </code></pre>
    </div>
</div>

</body>
</html>
