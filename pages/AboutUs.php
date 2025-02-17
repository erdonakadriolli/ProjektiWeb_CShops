
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <link rel="stylesheet" href="../styles/global.css">
    <link rel="stylesheet" href="../styles/AboutUs.css">
    <link rel="stylesheet" href="../styles/slider.css">

    <title>AboutUS</title>
</head>
<body>
        <?php include '../components/sales.php'; ?>
        <?php include '../components/header.php'; ?>
    <div class="imga">
        <img src="../styles/images/abutu.jpg">
    </div>
    

    <div class="AboutUS-1">
        <div class="abutus">
            <h1>
               About Us
            </h1>
            <p>
                Welcome to EY.SHOP, your one-stop destination for all things festive! We believe that the magic of Christmas starts with the perfect decorations, turning every home into a cozy winter wonderland.
                At Shop.Co, we specialize in high-quality Christmas décor, from dazzling lights and elegant ornaments to stunning Christmas trees and unique holiday gifts. Whether you're looking for classic, modern, or themed decorations, we have everything you need to make your holidays truly special.
            </p>
           
        </div>
        <div class="slider">
            <div class="slides">
              <img style="border-radius:8px;" class="slide" src="../styles/images/emma.png" alt="EMMA">
              <img style="border-radius:8px;" class="slide" src="../styles/images/sarah.png" alt="SARAH">
              
              <img style="border-radius:8px;" class="slide" src="../styles/images/mike.png" alt="MIKE">
              <img style="border-radius:8px;" class="slide" src="../styles/images/sarah.png" alt="SARAH">
              <img style="border-radius:8px;" class="slide" src="../styles/images/jack.png" alt="JACK">
            </div>
            <button class="pas" onclick="slidedPas()">&#10094</button>
            <button class="para" onclick="slidedPara()">&#10095</button>
          </div>
    </div>

    <div class="Story">
        <h1>🎄 The Story of EY.SHOP 🎄</h1>
        <p>It all started in a small town where the holiday season wasn’t just a time of year—it was a way of life. A group of Christmas enthusiasts realized that finding high-quality, beautifully designed decorations wasn’t always easy. So, they decided to create EY.SHOP, a place where every ornament, light, and wreath was handpicked to bring warmth and festive charm into homes everywhere.</p>
    </div>
    <div class="Jack">
        <div class="jack">
            <h1>Jack - Founder & Chief Holiday Enthusiast</h1>
            <p>A lifelong Christmas lover, Jack started SHOP.CO after noticing that holiday decorations were either too expensive or lacked personality. His goal? To make every home feel like a cozy winter wonderland—without breaking the bank.</p>
        </div>
        <div class="jacksrc">
            <img src="../styles/images/Jack.png">
        </div>
    </div>

    <div class="Sarah">
        <div class="sarahsrc">
            <img src="../styles/images/Sarah.png">
        </div>
        <div class="sarah">
            <h1>Sarah - Head of Product & Design</h1>
            <p>Sarah has a background in interior design and an eye for festive aesthetics. She ensures that every decoration in our collection is stylish, durable, and (most importantly) sparkles just the right amount.</p>
        </div>
        
    </div>

    <div class="Mike">
        <div class="mike">
            <h1>Mike - The Logistics Whiz</h1>
            <p>If there’s anyone who can get a 10-foot Christmas tree delivered in record time, it’s Mike. He makes sure that every order arrives safely—without looking like it survived a snowstorm.</p>
        </div>
        <div class="mikesrc">
            <img src="../styles/images/Mike.png">
        </div>
    </div>

    <div class="Emma">
        <div class="emmasrc">
            <img src="../styles/images/Emma.png">
        </div>
        <div class="emma">
            <h1>Emma - Customer Happiness Expert</h1>
            <p>Emma’s job is simple: make sure every customer has a stress-free shopping experience. Whether it’s finding the perfect set of lights or fixing a lost shipment, she’s the go-to holiday problem solver.</p>
        </div>
        
    </div>

    <?php include '../components/foooter.php'; ?>

</body>
<script src="../scripts/Slider.js"></script>

</html>

