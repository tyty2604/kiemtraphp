<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Nhân Sự</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Custom CSS -->
    <style>
        /* Enhanced styling */
        body { 
            padding-top: 80px; 
            background-color: #f4f6f9;
        }
        .navbar {
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }
        .navbar-brand {
            font-weight: 700;
            display: flex;
            align-items: center;
        }
        .navbar-brand i {
            margin-right: 10px;
            font-size: 1.5rem;
        }
        .nav-link {
            display: flex;
            align-items: center;
            transition: all 0.2s ease;
        }
        .nav-link i {
            margin-right: 6px;
        }
        .nav-link:hover {
            transform: translateY(-2px);
        }
        .dropdown-menu {
            border: none;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        @media (max-width: 992px) {
            .navbar-nav .nav-link {
                border-bottom: 1px solid rgba(255,255,255,0.1);
            }
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="index.php?controller=nhanvien&action=index">
            <i class="bi bi-people-fill"></i> Quản Lý Nhân Sự
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?controller=nhanvien&action=index">
                            <i class="bi bi-list-ul"></i> Danh Sách NV
                        </a>
                    </li>
                    <?php if ($this->isAdmin()): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?controller=nhanvien&action=add">
                                <i class="bi bi-person-plus-fill"></i> Thêm NV
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?controller=user&action=index">
                                <i class="bi bi-person-gear"></i> Quản Lý User
                            </a>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle"></i> 
                            <?php echo htmlspecialchars($_SESSION['user_fullname'] ?? $_SESSION['username']); ?> 
                            <span class="badge bg-secondary ms-2">
                                <?php echo htmlspecialchars($_SESSION['user_role']); ?>
                            </span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="index.php?controller=profile&action=view">
                                    <i class="bi bi-person-fill me-2"></i>Hồ Sơ Cá Nhân
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item text-danger" href="index.php?controller=auth&action=logout">
                                    <i class="bi bi-box-arrow-right me-2"></i>Đăng Xuất
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?controller=auth&action=register">
                            <i class="bi bi-person-plus"></i> Đăng Ký
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?controller=auth&action=login">
                            <i class="bi bi-box-arrow-in-right"></i> Đăng Nhập
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<main class="container mt-4">
    <!-- Main content goes here -->
</main>

<!-- Bootstrap JS and Popper (required for dropdowns and other JS components) -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>
</html>