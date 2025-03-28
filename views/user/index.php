<?php require_once '../views/layouts/header.php'; ?>

<div class="container mt-5">
    <h2 class="page-title">
        <i class="fas fa-users me-2"></i>Quản Lý Người Dùng
    </h2>

    <?php if (isset($_GET['success']) && $_GET['success'] == 'editrole'): ?>
        <div class="alert alert-success alert-custom" role="alert">
            <i class="fas fa-check-circle me-2"></i>Cập nhật vai trò người dùng thành công!
        </div>
    <?php endif; ?>

    <?php if (isset($_GET['error'])): ?>
        <div class="alert alert-danger alert-custom" role="alert">
            <i class="fas fa-exclamation-triangle me-2"></i>
            <?php
            $error_map = [
                'invalidid' => 'ID người dùng không hợp lệ.',
                'notfound' => 'Không tìm thấy người dùng.',
                'invalidrole' => 'Vai trò được chọn không hợp lệ.',
                'updatefailed' => 'Không thể cập nhật vai trò người dùng.',
                'selfedit' => 'Bạn không thể thay đổi vai trò của chính mình.',
                'lastadmin' => 'Không thể thay đổi vai trò của quản trị viên cuối cùng.'
            ];
            echo htmlspecialchars($error_map[$_GET['error']] ?? 'Đã xảy ra lỗi không xác định.');
            ?>
        </div>
    <?php endif; ?>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-users">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên đăng nhập</th>
                            <th>Họ và Tên</th>
                            <th>Email</th>
                            <th>Vai trò</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($users) > 0): ?>
                            <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($user['Id']); ?></td>
                                <td><?php echo htmlspecialchars($user['username']); ?></td>
                                <td><?php echo htmlspecialchars($user['fullname']); ?></td>
                                <td><?php echo htmlspecialchars($user['email']); ?></td>
                                <td>
                                    <span class="badge 
                                        <?php 
                                        echo match($user['role']) {
                                            'admin' => 'bg-danger',
                                            'moderator' => 'bg-warning',
                                            'user' => 'bg-success',
                                            default => 'bg-secondary'
                                        }; 
                                        ?>">
                                        <?php echo htmlspecialchars(ucfirst($user['role'])); ?>
                                    </span>
                                </td>
                                <td>
                                    <a href="index.php?controller=user&action=edit&id=<?php echo $user['Id']; ?>" 
                                       class="btn btn-sm btn-edit">
                                        <i class="fas fa-edit me-1"></i>Sửa Vai Trò
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center text-muted">
                                    <i class="fas fa-user-slash me-2"></i>Không có người dùng nào trong hệ thống.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php require_once '../views/layouts/footer.php'; ?>

<!-- Additional styles to complement header.php -->
<style>
    body {
        background-color: #f4f6f9;
        font-family: 'Roboto', sans-serif;
    }
    .page-title {
        color: #2c3e50;
        margin-bottom: 25px;
        border-bottom: 2px solid #3498db;
        padding-bottom: 10px;
    }
    .table-users {
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }
    .table-users thead {
        background-color: #3498db;
        color: white;
    }
    .table-users tbody tr:hover {
        background-color: #f1f3f5;
        transition: background-color 0.3s ease;
    }
    .btn-edit {
        background-color: #2ecc71;
        color: white;
    }
    .btn-edit:hover {
        background-color: #27ae60;
    }
    .alert-custom {
        margin-top: 20px;
        border-radius: 5px;
    }
</style>