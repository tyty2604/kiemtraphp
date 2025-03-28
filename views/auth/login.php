<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập Hệ Thống</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-blue-50 to-blue-100 min-h-screen flex items-center justify-center px-4 py-8">
    <div class="w-full max-w-md">
        <div class="bg-white shadow-2xl rounded-2xl overflow-hidden">
            <div class="p-8">
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-gray-800 mb-2">Đăng Nhập</h2>
                    <p class="text-gray-500">Chào mừng trở lại! Vui lòng nhập thông tin.</p>
                </div>

                <?php if (!empty($error)): ?>
                    <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6" role="alert">
                        <p class="font-bold">Lỗi đăng nhập</p>
                        <p><?php echo htmlspecialchars($error); ?></p>
                    </div>
                <?php endif; ?>

                <?php if (isset($_GET['loggedout'])): ?>
                    <div class="bg-green-50 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
                        <p>Bạn đã đăng xuất thành công.</p>
                    </div>
                <?php endif; ?>

                <form action="index.php?controller=auth&action=login" method="post">
                    <div class="mb-6">
                        <label for="username" class="block text-gray-700 font-semibold mb-2">
                            <i class="fas fa-user mr-2 text-blue-500"></i>Tài khoản
                        </label>
                        <input 
                            id="username" 
                            name="username" 
                            type="text" 
                            required 
                            placeholder="Nhập tài khoản"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300"
                        >
                    </div>

                    <div class="mb-6">
                        <label for="password" class="block text-gray-700 font-semibold mb-2">
                            <i class="fas fa-lock mr-2 text-blue-500"></i>Mật khẩu
                        </label>
                        <input 
                            id="password" 
                            name="password" 
                            type="password" 
                            required 
                            placeholder="Nhập mật khẩu"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300"
                        >
                    </div>

                    <div class="mb-6 flex items-center justify-between">
                        <div class="flex items-center">
                            <input 
                                id="remember" 
                                type="checkbox" 
                                class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                            >
                            <label for="remember" class="ml-2 block text-sm text-gray-900">
                                Ghi nhớ đăng nhập
                            </label>
                        </div>
                        <div>
                            <a href="#" class="text-sm text-blue-600 hover:text-blue-800">
                                Quên mật khẩu?
                            </a>
                        </div>
                    </div>

                    <button 
                        type="submit" 
                        class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105 shadow-lg"
                    >
                        Đăng Nhập
                    </button>
                </form>

                <div class="mt-6 text-center">
                    <p class="text-gray-600">
                        Chưa có tài khoản? 
                        <a href="#" class="text-blue-600 hover:text-blue-800 font-semibold">
                            Đăng ký ngay
                        </a>
                    </p>
                </div>
            </div>
        </div>
        
        <div class="mt-4 text-center text-gray-500 text-sm">
            © 2024 Hệ Thống Quản Lý. Bản quyền thuộc về công ty.
        </div>
    </div>

    <script>
        // Optional: Simple form validation
        document.querySelector('form').addEventListener('submit', function(e) {
            const username = document.getElementById('username');
            const password = document.getElementById('password');
            
            if (username.value.trim() === '') {
                alert('Vui lòng nhập tài khoản');
                e.preventDefault();
            }
            
            if (password.value.trim() === '') {
                alert('Vui lòng nhập mật khẩu');
                e.preventDefault();
            }
        });
    </script>
</body>
</html>