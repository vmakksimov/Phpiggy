<?php include $this->resolve("partials/_header.php"); ?>

<section class="max-w-2xl mx-auto mt-12 p-4 bg-white shadow-md border border-gray-200 rounded">
  <form method="POST" class="grid grid-cols-1 gap-6">
    <label class="block">
      <span class="text-gray-700">Email address</span>
      <input value="<?php echo e($oldFormData['email'] ?? ''); ?>" name="email" type="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="john@example.com" />
    </label>
    <?php if (array_key_exists('email', $errors)) : ?>
        <div style="color: red">
          <?php echo e($errors['email'][0]); ?>
        </div>
      <?php  endif; ?>
    <label class="block">
      <span class="text-gray-700">Password</span>
      <input name="password" type="password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="" />
    </label>
    <?php if (array_key_exists('password', $errors)) : ?>
        <div style="color: red">
          <?php echo e($errors['password'][0]); ?>
        </div>
      <?php  endif; ?>
    <button type="submit" class="block w-full py-2 bg-indigo-600 text-white rounded">
      Submit
    </button>
  </form>
</section>

<?php include $this->resolve("partials/_footer.php"); ?>