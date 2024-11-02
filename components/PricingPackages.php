<?php
$packages = [
  [
    "name" => "Basic Package",
    "id" => "tier-basic",
    "price" => "$700",
    "description" => "1 Monthly review with limited campaign optimization.",
    "features" => [
      "1 Meeting per month",
      "Initial Strategy Session",
      "Limited Campaign Optimization",
      "No Organic Advertisement",
      "A/B Testing",
      "No Phone Support"
    ],
  ],
  [
    "name" => "Standard Package",
    "id" => "tier-standard",
    "price" => "$1000",
    "description" => "Bi-monthly review & optimization with limited ad posts.",
    "features" => [
      "2 Meetings per month",
      "Initial Strategy Session",
      "Twice a Month Campaign Optimization",
      "2-3 Organic Posts per Month",
      "A/B Testing",
      "On-Demand Support",
      "No Phone Support"
    ],
  ],
  [
    "name" => "Premium Package",
    "id" => "tier-premium",
    "price" => "$1300",
    "description" => "Weekly optimization and full organic campaign management.",
    "features" => [
      "4 Meetings per month",
      "Initial Strategy Session",
      "Twice a Week Campaign Optimization",
      "Organic Advertisement",
      "A/B Testing",
      "On-Demand Support",
      "Phone Support"
    ],
  ]
];
?>

<div class="relative px-6 my-24">
  <div class="mx-auto max-w-4xl text-center">
    <p class="text-2xl font-extrabold md:text-3xl lg:text-4xl text-center text-transparent bg-clip-text bg-gradient-to-tl from-blue-800 to-blue-600">
      Special Offer Callout
    </p>
  </div>
  <p class="mx-auto mt-6 max-w-2xl text-center text-lg font-medium text-gray-600">
    Compare our packages and select the one that best meets your needs.
  </p>

  <div class="space-y-8 lg:grid lg:grid-cols-3 sm:gap-6 xl:gap-10 lg:space-y-0 mt-16 max-w-lg mx-auto lg:max-w-5xl">
    <?php foreach ($packages as $pkg): ?>
      <div class="flex flex-col p-6 max-w-lg mx-auto text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 dark:bg-gray-800 dark:text-white">
        <h3 class="mb-4 text-2xl font-semibold"><?= $pkg['name'] ?></h3>
        <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">
          <?= $pkg['description'] ?>
        </p>
        <div class="flex justify-center items-baseline my-8">
          <span class="mr-2 text-5xl font-extrabold"><?= $pkg['price'] ?></span>
          <span class="text-gray-500 dark:text-gray-400">/month</span>
        </div>

        <ul role="list" class="mb-8 space-y-4 text-left">
          <?php foreach ($pkg['features'] as $feature): ?>
            <li class="flex items-center space-x-3">
              <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
              </svg>
              <span><?= $feature ?></span>
            </li>
          <?php endforeach; ?>
        </ul>

        <a href="#" class="text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:ring-primary-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:text-white dark:focus:ring-primary-900">
          Get started
        </a>
      </div>
    <?php endforeach; ?>
  </div>
</div>
