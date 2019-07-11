<?php $__env->startSection('content'); ?>
<!DOCTYPE html>
<html>
<head>
<!--  ///////////////////////////////  START CARD CODE  /////////////////////////////////// -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
          font-family: Arial, Helvetica, sans-serif;
      }

      .flip-box {
          background-color: transparent;
          width: 300px;
          height: 200px;
          border: 1px solid #f1f1f1;
          perspective: 1000px;
      }

      .flip-box-inner {
          position: relative;
          width: 100%;
          height: 100%;
          text-align: center;
          transition: transform 0.8s;
          transform-style: preserve-3d;
      }

      .flip-box:hover .flip-box-inner {
          transform: rotateY(180deg);
      }

      .flip-box-front, .flip-box-back {
          position: absolute;
          width: 100%;
          height: 100%;
          backface-visibility: hidden;
      }

      .flip-box-front {
          background-color: #bbb;
          color: black;
      }

      .flip-box-back {
          background-color: dodgerblue;
          color: white;
          transform: rotateY(180deg);
      }
  </style>
</head>
<body>

<!-- <h1>3D Flip Box (Horizontal)</h1>
    <h3>Hover over the box below:</h3> -->

    <div class="flip-box">
      <div class="flip-box-inner">
        <div class="flip-box-front">
          <h2>Front Side</h2>
      </div>
      <div class="flip-box-back">
          <h2>Back Side</h2>
      </div>
  </div>
</div>

<input type="text" name="">

</body>
</html>
<br><br>
<!--  ///////////////////////////////  END CARD CODE  /////////////////////////////////// -->

<!-- /////////////////////////DROUP DOWN WITH Check BOX START ///////////////////////////-->
<style type="text/css" media="all">
    .multiselect {
      width: 200px;
  }

  .selectBox {
      position: relative;
  }

  .selectBox select {
      width: 100%;
      font-weight: bold;
  }

  .overSelect {
      position: absolute;
      left: 0;
      right: 0;
      top: 0;
      bottom: 0;
  }

  #checkboxes {
      display: none;
      border: 1px #dadada solid;
  }

  #checkboxes label {
      display: block;
  }

  #checkboxes label:hover {
      background-color: #1e90ff;
  }
  
</style>

<form>
  <div class="multiselect">
    <div class="selectBox" onclick="showCheckboxes()">
      <select>
        <option>Select an option</option>
    </select>
    <div class="overSelect"></div>
</div>
<div id="checkboxes">
  <label for="one">
    <input type="checkbox" id="one" />First checkbox</label>
    <label for="two">
        <input type="checkbox" id="two" />Second checkbox</label>
        <label for="three">
            <input type="checkbox" id="three" />Third checkbox</label>
            <label for="Four">
                <input type="checkbox" id="Four" />Fourth checkbox</label>
            </div>
        </div>
    </form>

    <script type="text/javascript" charset="utf-8">

        var expanded = false;
        function showCheckboxes() {
           var checkboxes = document.getElementById("checkboxes");
           if (!expanded) {
            checkboxes.style.display = "block";
            expanded = true;
        } else {
            checkboxes.style.display = "none";
            expanded = false;
        }
    }
</script>

     <!-- ////////////////////Droup Down With Check Box End /////////////////////////-->

     <!--//////////////////// Droup Down With Check Box Two Start ///////////////////-->
<div class="col-md-6 col-sm-12 col-xs-12 pad-lft-right">
    <div class="form-group">
        <select  name="product_cat" id="product_cat" class="multiselect-ui form-control block select-sty" placeholder="Products" multiple="multiple">
            <option  value="Apparels">Apparels</option>
            <option value="Appliances">Appliances</option>
            <option value="Others">Others</option>
        </select>
    </div>
</div> 

<script type="text/javascript">
    $(function() {
        $('.multiselect-ui').multiselect({
            includeSelectAllOption: true
        });
    });
</script>

    <!-- //////////////////////////Droup Down With Check Box Two End/////////////////// -->

    <!-- //////////////////////////Tree View Start ///////////////////////////////////  -->

<style type="text/css">
  #simple-treeview, #product-details {
    display: inline-block;
}

#product-details {
    vertical-align: top;
    width: 400px;
    height: 420px;
    margin-left: 20px;
}

#product-details > img {
    border: none;
    height: 300px;
    width: 400px;
}

#product-details > .name {
    text-align: center;
    font-size: 20px;
}

#product-details > .price {
    text-align: center;
    font-size: 24px;
}

.dark #product-details > div {
    color: #f0f0f0;
}

.hidden {
    visibility: hidden;
}
</style>



<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>DevExtreme Demo</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script>window.jQuery || document.write(decodeURIComponent('%3Cscript src="js/jquery.min.js"%3E%3C/script%3E'))</script>
    <link rel="stylesheet" type="text/css" href="https://cdn3.devexpress.com/jslib/18.2.7/css/dx.common.css" />
    <link rel="dx-theme" data-theme="generic.light" href="https://cdn3.devexpress.com/jslib/18.2.7/css/dx.light.css" />
    <script src="https://cdn3.devexpress.com/jslib/18.2.7/js/dx.all.js"></script>
    <script src="data.js"></script>
    <link rel="stylesheet" type ="text/css" href ="styles.css" />
    <script src="index.js"></script>
</head>
<body class="dx-viewport">
    <div class="demo-container">
        <div class="form">
            <div id="simple-treeview" style="margin-left: -410px"></div>
            <div id="product-details" class="hidden">
                <img src="" />
                <div class="name"></div>
                <div class="price"></div>
            </div>
        </div>
    </div>
</body>
</html>
<script type="text/javascript">
  var products = [{
    id: "1",
    text: "Stores",
    expanded: true,
    items: [{
        id: "1_1",
        text: "Super Mart of the West",
        expanded: true,
        items: [{
            id: "1_1_1",
            text: "Video Players",
            items: [{
                id: "1_1_1_1",
                text: "HD Video Player",
                price: 220,
                image: "<?php echo e(url('images/head_.jpg')); ?>"
            }, {
                id: "1_1_1_2",
                text: "SuperHD Video Player",
                image: "images/products/2.png",
                price: 270
            }]
        }, {
            id: "1_1_2",
            text: "Televisions",
            expanded: true,
            items: [{
                id: "1_1_2_1",
                text: "SuperLCD 42",
                image: "images/products/7.png",
                price: 1200
            }, {
                id: "1_1_2_2",
                text: "SuperLED 42",
                image: "images/products/5.png",
                price: 1450
            }, {
                id: "1_1_2_3",
                text: "SuperLED 50",
                image: "images/products/4.png",
                price: 1600
            }, {
                id: "1_1_2_4",
                text: "SuperLCD 55",
                image: "images/products/6.png",
                price: 1350
            }, {
                id: "1_1_2_5",
                text: "SuperLCD 70",
                image: "images/products/9.png",
                price: 4000
            }]
        }, {
            id: "1_1_3",
            text: "Monitors",
            expanded: true,
            items: [{
                id: "1_1_3_1",
                text: "19\"",
                expanded: true,
                items: [{
                    id: "1_1_3_1_1",
                    text: "DesktopLCD 19",
                    image: "images/products/10.png",
                    price: 160
                }]
            }, {
                id: "1_1_3_2",
                text: "21\"",
                items: [{
                    id: "1_1_3_2_1",
                    text: "DesktopLCD 21",
                    image: "images/products/12.png",
                    price: 170
                }, {
                    id: "1_1_3_2_2",
                    text: "DesktopLED 21",
                    image: "images/products/13.png",
                    price: 175
                }]
            }]
        }, {
            id: "1_1_4",
            text: "Projectors",
            items: [{
                id: "1_1_4_1",
                text: "Projector Plus",
                image: "images/products/14.png",
                price: 550
            }, {
                id: "1_1_4_2",
                text: "Projector PlusHD",
                image: "images/products/15.png",
                price: 750
            }]
        }]

    }, {
        id: "1_2",
        text: "Braeburn",
        items: [{
            id: "1_2_1",
            text: "Video Players",
            items: [{
                id: "1_2_1_1",
                text: "HD Video Player",
                image: "images/products/1.png",
                price: 240
            }, {
                id: "1_2_1_2",
                text: "SuperHD Video Player",
                image: "images/products/2.png",
                price: 300
            }]
        }, {
            id: "1_2_2",
            text: "Televisions",
            items: [{
                id: "1_2_2_1",
                text: "SuperPlasma 50",
                image: "images/products/3.png",
                price: 1800
            }, {
                id: "1_2_2_2",
                text: "SuperPlasma 65",
                image: "images/products/8.png",
                price: 3500
            }]
        }, {
            id: "1_2_3",
            text: "Monitors",
            items: [{
                id: "1_2_3_1",
                text: "19\"",
                items: [{
                    id: "1_2_3_1_1",
                    text: "DesktopLCD 19",
                    image: "images/products/10.png",
                    price: 170
                }]
            }, {
                id: "1_2_3_2",
                text: "21\"",
                items: [{
                    id: "1_2_3_2_1",
                    text: "DesktopLCD 21",
                    image: "images/products/12.png",
                    price: 180
                }, {
                    id: "1_2_3_2_2",
                    text: "DesktopLED 21",
                    image: "images/products/13.png",
                    price: 190
                }]
            }]
        }]

    }, {
        id: "1_3",
        text: "E-Mart",
        items: [{
            id: "1_3_1",
            text: "Video Players",
            items: [{
                id: "1_3_1_1",
                text: "HD Video Player",
                image: "images/products/1.png",
                price: 220
            }, {
                id: "1_3_1_2",
                text: "SuperHD Video Player",
                image: "images/products/2.png",
                price: 275
            }]
        }, {
            id: "1_3_3",
            text: "Monitors",
            items: [{
                id: "1_3_3_1",
                text: "19\"",
                items: [{
                    id: "1_3_3_1_1",
                    text: "DesktopLCD 19",
                    image: "images/products/10.png",
                    price: 165
                }]
            }, {
                id: "1_3_3_2",
                text: "21\"",
                items: [{
                    id: "1_3_3_2_1",
                    text: "DesktopLCD 21",
                    image: "images/products/12.png",
                    price: 175
                }]
            }]
        }]
    }, {
        id: "1_4",
        text: "Walters",
        items: [{
            id: "1_4_1",
            text: "Video Players",
            items: [{
                id: "1_4_1_1",
                text: "HD Video Player",
                image: "images/products/1.png",
                price: 210
            }, {
                id: "1_4_1_2",
                text: "SuperHD Video Player",
                image: "images/products/2.png",
                price: 250
            }]
        }, {
            id: "1_4_2",
            text: "Televisions",
            items: [{
                id: "1_4_2_1",
                text: "SuperLCD 42",
                image: "images/products/7.png",
                price: 1100
            }, {
                id: "1_4_2_2",
                text: "SuperLED 42",
                image: "images/products/5.png",
                price: 1400
            }, {
                id: "1_4_2_3",
                text: "SuperLED 50",
                image: "images/products/4.png",
                price: 1500
            }, {
                id: "1_4_2_4",
                text: "SuperLCD 55",
                image: "images/products/6.png",
                price: 1300
            }, {
                id: "1_4_2_5",
                text: "SuperLCD 70",
                image: "images/products/9.png",
                price: 4000
            }, {
                id: "1_4_2_6",
                text: "SuperPlasma 50",
                image: "images/products/3.png",
                price: 1700
            }]
        }, {
            id: "1_4_3",
            text: "Monitors",
            items: [{
                id: "1_4_3_1",
                text: "19\"",
                items: [{
                    id: "1_4_3_1_1",
                    text: "DesktopLCD 19",
                    image: "images/products/10.png",
                    price: 160
                }]
            }, {
                id: "1_4_3_2",
                text: "21\"",
                items: [{
                    id: "1_4_3_2_1",
                    text: "DesktopLCD 21",
                    image: "images/products/12.png",
                    price: 170
                }, {
                    id: "1_4_3_2_2",
                    text: "DesktopLED 21",
                    image: "images/products/13.png",
                    price: 180
                }]
            }]
        }, {
            id: "1_4_4",
            text: "Projectors",
            items: [{
                id: "1_4_4_1",
                text: "Projector Plus",
                image: "images/products/14.png",
                price: 550
            }, {
                id: "1_4_4_2",
                text: "Projector PlusHD",
                image: "images/products/15.png",
                price: 750
            }]
        }]

    }]
}];
</script>
<script type="text/javascript">
  $(function(){
    $("#simple-treeview").dxTreeView({ 
        items: products,
        width: 300,

        onItemClick: function(e) {
            var item = e.itemData;
            if(item.price) {
                $("#product-details").removeClass("hidden");
                $("#product-details > img").attr("src", item.image);
                $("#product-details > .price").text("$" + item.price);
                $("#product-details > .name").text(item.text);
            } else {
                $("#product-details").addClass("hidden");
            }
        }
    }).dxTreeView("instance");
});
</script>

    <!-- ////////////////////////Tree View End /////////////////////////////////////  -->


<!--     on click colour change  start
 -->

 <body>

<table border="1" cellspacing="1" width="100%" id="table1">
    <tr>
        <th>Column1</th>
        <th>Column2</th>
        <th>Column3</th>
        <th>Column4</th>
        <th>Column5</th>
    </tr>
    <tr>
        <td>data</td>
        <td>data</td>
        <td>data</td>
        <td>data</td>
        <td>data</td>
    </tr>
    <tr>
        <td>data</td>
        <td>data</td>
        <td>data</td>
        <td>data</td>
        <td>data</td>
    </tr>
    <tr>
        <td>data</td>
        <td>data</td>
        <td>data</td>
        <td>data</td>
        <td>data</td>
    </tr>
    <tr>
        <td>data</td>
        <td>data</td>
        <td>data</td>
        <td>data</td>
        <td>data</td>
    </tr>
</table>

</body>
<script type="text/javascript">
$(document).ready(function () {
    $('tr').click(function () {
        if(this.style.background == "" || this.style.background =="yellow") {
            $(this).css('background', 'red');
        }
        else {
            $(this).css('background', 'yellow');
        }
    });
});
</script>

<!--     on click colour change  End
 -->
 <?php $__env->stopSection(); ?>

<?php echo $__env->make('include.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>