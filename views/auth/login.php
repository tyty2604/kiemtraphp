<?php require_once '../views/layouts/header.php'; ?>

<div class="min-h-screen bg-gray-100 flex flex-col justify-center py-12 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
            Đăng Nhập Hệ Thống
        </h2>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white py-8 px-4 shadow-lg sm:rounded-lg sm:px-10">
            <?php if (!empty($error)): ?>
                <div class="bg-red-50 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline"><?php echo htmlspecialchars($error); ?></span>
                </div>
            <?php endif; ?>

            <?php if (isset($_GET['loggedout'])): ?>
                <div class="bg-green-50 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">Bạn đã đăng xuất thành công.</span>
                </div>
            <?php endif; ?>

            <form action="index.php?controller=auth&action=login" method="post" class="space-y-6">
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">Tài khoản</label>
                    <div class="mt-1">
                        <input 
                            id="username" 
                            name="username" 
                            type="text" 
                            required 
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            placeholder="Nhập tài khoản"
                        >
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Mật khẩu</label>
                    <div class="mt-1">
                        <input 
                            id="password" 
                            name="password" 
                            type="password" 
                            required 
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            placeholder="Nhập mật khẩu"
                        >
                    </div>
                </div>

                <div>
                    <button 
                        type="submit" 
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        Đăng Nhập
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once '../views/layouts/footer.php'; ?>