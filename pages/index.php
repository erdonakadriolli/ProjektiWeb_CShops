<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
       
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../styles/mainpage.css">
        <link rel="stylesheet" href="../styles/GallerySlider.css">
        <link rel="stylesheet" href="../styles/GallerySlider2.css">
    </head>
    <body>
        <?php include '../components/sales.php'; ?>
        <?php include '../components/header.php'; ?>
        
        
        <div class="container-3">
            <div class="container-3-1">
                <h1>
                    BRING HOLIDAY MAGIC TO YOUR HOME
                </h1>
                <h4 class="nentitulli-1">
                    ✨🎄Everything you need for festive Decorations!🎄✨
                </h4>
                <p>
                    Get ready to celebrate the season with our exclusive collection of holiday décor. From sparkling lights to elegant ornaments, we offer everything to make your home shine this Christmas and New Year.
                </p>

                <a href="AboutUs.php"><input id="Submit-1" type="submit" value="About Us"></a> 
            <div class="TeDhena-container">
                <div class="TeDhena-1">
                    <h2>
                        200+ 
                    </h2>
                    <p>
                        International Brands 
                    </p>
                </div>
                <div class="TeDhena-1">
                        <h2>
                            2,000+ 
                       </h2>
                        <p>
                            High-quality Products 
                        </p>
                     </div>
                     <div class="TeDhena-1">
                        <h2>
                            30,000+ 
                        </h2>
                      <p>
                          Happy Customers 
                       </p>
                 </div>
                </div>
            </div>
            <div class="container-3-2">
                <img src="../styles/images/decor.png">
            </div>
        </div>

        <div class="container-4">
            <h1>
                Merry Christmas and Happy Holidays from EY.SHOP!🎄✨
            </h1>
        </div>

        <h1 class="New-Arrivals"> NEW ARRIVALS</h1>

        <div class="container-5">
            
        <?php include '../components/gallery.php'; ?>
      
            
        </div>
        <div class="search-2">
        <a href="productlist.php"> <input  type="submit" value="view All" class="view-all"> </a>
        </div>
        <p style="text-align: center; color: rgb(86, 86, 86);">________________________________________________________________________________________________________________________________________________________________________________</p>

        <h1 class="New-Arrivals">Top Selling</h1>

        <div class="container-5">
            
        <?php include '../components/gallery.php'; ?>
        <div class="search-2">
            <a href="productlist.php"> <input  type="submit" value="view All" class="view-all"> </a>
        </div>

        <div class="container-6">
            <div class="top-1">
                <a href="#"><img src="../styles/images/decor1.jpg"></a>
                <a href="#"><img src="../styles/images/decor2.jpg"></a>
                <a href="#"><img src="../styles/images/decor3.jpg"></a>
                <a href="#"><img src="../styles/images/decor4.jpg"></a>
            </div>
            <br>
            <div class="bottom-1">
                <a href="#"><img src="../styles/images/decor5.jpg"></a>
                <a href="#"><img src="../styles/images/decor6.jpg"></a>
                <a href="#"><img src="../styles/images/decor7.jpg"></a>
                <a href="#"><img src="../styles/images/decor8.jpg"></a>
                <a href="#"><img src="../styles/images/decor9.jpg"></a>
            </div>
          
        </div>

        <?php include '../components/foooter.php'; ?>
                
</body>
    <script src="../scripts/GallerySlider.js"></script>
  
</html>