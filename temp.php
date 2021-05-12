<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/99d1df08d7.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <style>
      body {
        color: #747474;
      }
      td,th {
        background-color: #f6f6f7;
        margin: 5px;
      }
      .user-hidden {
        display: none;
      }

    </style>
    <title>Hello, world!</title>
</head>

<body>
    <?php
        $state_ut = array(
          "AN" => "Andaman and Nicobar Islands",
          "AP" => "Andhra Pradesh",
          "AR" => "Arunachal Pradesh",
          "AS" => "Assam",
          "BR" => "Bihar",
          "CH" => "Chandigarh",
          "CT" => "Chhattisgarh",
          "DL" => "Delhi",
          "DN" => "Dadra And Nagar Haveli",
          "GA" => "Goa",
          "GJ" => "Gujarat",
          "HP" => "Himachal Pradesh",
          "HR" => "Haryana",
          "JH" => "Jharkhand",
          "JK" => "Jammu and Kashmir",
          "KA" => "Karnataka",
          "KL" => "Kerala",
          "LA" => "Ladakh",
          "LD" => "Lakshadweep",
          "MH" => "Maharashtra",
          "ML" => "Meghalaya",
          "MN" => "Manipur",
          "MP" => "Madhya Pradesh",
          "MZ" => "Mizoram",
          "NL" => "Nagaland",
          "OR" => "Orissa",
          "PB" => "Punjab",
          "PY" => "Pondicherry",
          "RJ" => "Rajasthan",
          "SK" => "Sikkim",
          "TG" => "TELANGANA",
          "TN" => "Tamil Nadu",
          "TR" => "Tripura",
          "TT" => "TOTAL",
          "UP" => "Uttar Pradesh",
          "UT" => "Uttarakhand",
          "WB" => "West Bengal"
        );
        $data = file_get_contents('https://api.covid19india.org/v4/min/data.min.json');
        $coronadata = json_decode($data, true);
        ?>
        
        <div class="row">
          <div class="col">
            <div class="card border-0" style="width: 18rem;">
              <div class="card-body">
                <h5 class="card-title text-danger text-center">Confirmed</h5>
                <h6 class="card-subtitle mb-2 text-danger"></h6>
                <p class="card-text text-danger text-center"><?php echo $coronadata['TT']['total']['confirmed']; ?></p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card border-0" style="width: 18rem;">
              <div class="card-body">
                <h5 class="card-title text-primary text-center">Active</h5>
                <h6 class="card-subtitle mb-2 text-primary"></h6>
                <p class="card-text text-primary text-center"><?php echo ($coronadata['TT']['total']['confirmed'] - $coronadata['TT']['total']['recovered'] - $coronadata['TT']['total']['deceased']); ?></p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card border-0" style="width: 18rem;">
              <div class="card-body">
                <h5 class="card-title text-success text-center">Recovered</h5>
                <h6 class="card-subtitle mb-2 text-success"></h6>
                <p class="card-text text-success text-center"><?php echo $coronadata['TT']['total']['recovered']; ?></p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card border-0" style="width: 18rem;">
              <div class="card-body">
                <h5 class="card-title text-muted text-center">Deceased</h5>
                <h6 class="card-subtitle mb-2 text-muted"></h6>
                <p class="card-text text-muted text-center"><?php echo $coronadata['TT']['total']['deceased']; ?></p>
              </div>
            </div>
          </div>
          
        </div>
        <table class="table">
          <tr class="bg-secondary">
            <th>State/UT</th>
            <th>Confirmed</th>
            <th>Active</th>
            <th>Recovered</th>
            <th>Deceased</th>
          </tr>
        <?php
        foreach($coronadata as $x=>$value) { 
          if($x == 'TT')
            continue;
        ?>
          <tr>
            <td id="<?php echo $x;?>">
              <?php echo $state_ut[$x]; ?> 
              <button class="btn btn-outline-primary user-hidden btn-sm " id="<?php echo $x.'btn';?>">Live Data<i class="fas fa-arrow-right" style="margin: 0 0 0 7px;"></i></button>
          </td>
            <td><?php echo $value['total']['confirmed']; ?></td>
            <td><?php echo ($value['total']['confirmed'] - $value['total']['recovered'] - $value['total']['deceased']);?></td>
            <td><?php echo $value['total']['recovered'];?></td>
            <td><?php echo $value['total']['deceased'];?></td>
          </tr>
          <?php
        }
          ?>
          </table>

            <?php
            // echo ' ';
            // if(array_key_exists("delta",$value))
            // {
            //   echo 'live data';
            //   print_r($value["delta"]);
            // }
            
            //   // echo 'total';
            //   // print_r($value['total']);
            // echo '<br>';
        

        
    ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script>
      $(document).ready(function(){
        $("td").click(function(){
          var x = $(this).attr('id');
          $("td#"+x+" button.user-hidden").show(1000);
          $("#"+x+"btn").click(function(){
            $("td#"+x).append("<div style='with:100%;'>hello</div>");
                // console.log('hello');
          })
        })
      })
    </script>
</body>

</html>