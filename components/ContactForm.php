<?php
// Load necessary files
require 'script.php';

$sendResult = ''; // To track the result of sending the email
$errors = []; // To hold validation errors

if (isset($_POST['sendEmail'])) {
  // Validate fields
  if (empty($_POST['company']))
    $errors[] = "Company Name is required.";
  if (empty($_POST['fullName']))
    $errors[] = "Full Name is required.";
  if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
    $errors[] = "A valid email is required.";
  if (empty($_POST['cityState']))
    $errors[] = "City and State are required.";
  if (empty($_POST['phone']) || !preg_match('/^\+?[0-9]{10,15}$/', $_POST['phone']))
    $errors[] = "A valid phone number is required.";
  if (empty($_POST['message']))
    $errors[] = "Message content is required.";

  // Only proceed if there are no errors
  if (empty($errors)) {
    // Sanitize and assign form data
    $company = htmlspecialchars($_POST['company'], ENT_QUOTES, 'UTF-8');
    $fullName = htmlspecialchars($_POST['fullName'], ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
    $cityState = htmlspecialchars($_POST['cityState'], ENT_QUOTES, 'UTF-8');
    $phone = htmlspecialchars($_POST['phone'], ENT_QUOTES, 'UTF-8');
    $messageContent = htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8');

    // Construct HTML message
    $message = "
        <html>
        <body style='color: black; font-family: Arial, sans-serif;'>
            <p><strong>Company Name:</strong> $company</p>
            <p><strong>Full Name:</strong> $fullName</p>
            <p><strong>Email Address:</strong> $email</p>
            <p><strong>City and State:</strong> $cityState</p>
            <p><strong>Phone Number:</strong> $phone</p>
            <p><strong>Message:</strong><br>$messageContent</p>
        </body>
        </html>";

    // Set headers for HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // Define subject line
    $subject = "New Contact Form Submission from $fullName";

    // Send the email and store the result
    $sendResult = sendMail('zozobradogenard@gmail.com', $subject, $message);
  }
}
?>

<div>
  <h2
    class="text-transparent bg-clip-text bg-gradient-to-tl from-blue-800 to-blue-600 text-2xl font-extrabold md:text-3xl lg:text-4xl text-center">
    I'm Ready for Results!
    <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-800 to-blue-600">
      &ndash; Let's Improve<br>My Facebook Ads Goat!
    </span>
  </h2>
  <h2 class="my-2 text-center text-[16px] font-bold text-gray-800">
    "Your Vision, Our Expertise: Maximizing Marketing Results Together. <br>
    For Limited Time 50% OFF FOR THE FIRST MONTH."
  </h2>

  <div class="bg-white p-8 rounded-lg max-w-xl mx-auto shadow-md border border-gray-200 my-3">
    <p class="text-lg text-center font-bold text-gray-900">
      Contact Form
    </p>

    <?php if (!empty($errors)): ?>
      <ul class="text-red-500 text-sm">
        <?php foreach ($errors as $error): ?>
          <li><?php echo $error; ?></li>
        <?php endforeach; ?>
      </ul>
    <?php elseif ($sendResult === 'success'): ?>
      <script>
        // Show the modal if the email is sent successfully
        window.onload = function () {
          showSuccessModal();
        };
      </script>
    <?php endif; ?>

    <!-- Contact form with client-side validation patterns -->
    <form class="mt-8 space-y-4 rounded-2xl" action="" method="post" enctype="multipart/form-data">
      <input type="text" name="company" placeholder="Company Name" class="w-full rounded-lg py-3 px-4" required />
      <input type="text" name="fullName" placeholder="Full Name" class="w-full rounded-lg py-3 px-4" required />
      <input type="email" name="email" placeholder="Email Address" class="w-full rounded-lg py-3 px-4" required />
      <input type="text" name="cityState" placeholder="City and State" class="w-full rounded-lg py-3 px-4" required />
      <input type="tel" name="phone" placeholder="Phone Number" class="w-full rounded-lg py-3 px-4"
        pattern="\+?[0-9]{10,15}" required />
      <textarea name="message" placeholder="Your Message" rows="6" class="w-full rounded-lg px-4 py-3"
        required></textarea>
      <button type="submit" name="sendEmail" class="text-white bg-blue-600 hover:bg-blue-500 tracking-wide rounded-lg text-sm px-4 py-3 flex items-center justify-center w-full mt-6 shadow-md">
        Send Email
      </button>
    </form>
  </div>
</div>

<!-- Success Modal -->
<div id="successModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
  <div class="border rounded-lg shadow-lg bg-white relative max-w-sm mx-auto p-6">
    <div class="flex justify-end">
      <button onclick="hideSuccessModal()" type="button" class="text-gray-400 hover:bg-gray-200 p-1.5 ml-auto">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd"
            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
            clip-rule="evenodd"></path>
        </svg>
      </button>
    </div>

    <div class="text-center">
      <img src="https://img.icons8.com/emoji/96/check-mark-emoji.png" alt="check-mark-emoji"
        class="mx-auto mb-4 w-24 h-24" />
      <h3 class="text-xl font-semibold text-gray-9900 mt-5 mb-6 text-center">"Thank you for submitting your information! We'll be in touch within the next 24 hours. Looking forward to connecting with you!"</h3>
    </div>
  </div>
</div>

<script>
  function showSuccessModal() {
    document.getElementById('successModal').classList.remove('hidden');
    setTimeout(hideSuccessModal, 3000);
  }
  function hideSuccessModal() {
    document.getElementById('successModal').classList.add('hidden');
  }
</script>