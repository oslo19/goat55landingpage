  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Goat 55 Marketing</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/css/styles.css">
  </head>
  <body class="min-h-screen">
  <?php include 'components/Header.php'; ?>
    <div class="max-w-6xl md:mx-auto   p-3 rounded-2xl">
    
      <div class="w-full rounded-2xl bg-[#D8E1E7] shadow-lg p-6">
        <div class="flex flex-col md:flex-row gap-8">
          <!-- Left Column -->
          <div class="md:w-1/1 p-4">
            <?php include 'components/ContactForm.php'; ?>
            <?php include 'components/VideoEmbed.php'; ?>
            <?php include 'components/ServicesOverview.php'; ?>
            

            <!-- Special Offer (visible on small screens) -->
            <div class="block md:hidden mt-8">
              <?php include 'components/SpecialOffer.php'; ?>
            </div>
          </div>

          <!-- Right Column for Special Offer (visible only on larger screens) -->
          <div class="hidden md:block md:w-1/2 p-4 bg-gradient-to-tl from-blue-800 to-blue-800 rounded-lg ">
            <?php include 'components/SpecialOffer.php'; ?>
          </div>
        </div>
        <!-- Testimonials Section -->
        <?php include 'components/Testimonials.php'; ?>
        <!-- Package Section -->
        <?php include 'components/PricingPackages.php'; ?>
      </div>
    </div>

    <!-- Footer -->
    <?php include 'components/Footer.php'; ?>
  </body>
  </html>
