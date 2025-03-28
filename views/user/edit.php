<?php require_once '../views/layouts/header.php'; ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h2 class="mb-0">
                        <i class="fas fa-user-edit me-2"></i>Chỉnh Sửa Vai Trò Người Dùng
                    </h2>
                </div>

                <?php if (empty($user)): ?>
                    <div class="card-body">
                        <div class="alert alert-danger" role="alert">
                            <i class="fas fa-exclamation-triangle me-2"></i>Không tìm thấy người dùng.
                        </div>
                        <div class="text-center">
                            <a href="index.php?controller=user&action=index" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Quay lại danh sách người dùng
                            </a>
                        </div>
                    </div>
                <?php else: ?>
                    <?php if (isset($_GET['error'])): ?>
                        <div class="card-body">
                            <div class="alert alert-danger" role="alert">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                <?php
                                $error_map = [
                                    'invalidrole' => 'Vai trò được chọn không hợp lệ.',
                                    'updatefailed' => 'Không thể cập nhật vai trò người dùng.',
                                    'selfedit' => 'Bạn không thể thay đổi vai trò của chính mình.',
                                    'lastadmin' => 'Không thể thay đổi vai trò của quản trị viên cuối cùng.'
                                ];
                                echo htmlspecialchars($error_map[$_GET['error']] ?? 'Đã xảy ra lỗi không xác định.');
                                ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <form action="index.php?controller=user&action=edit&id=<?php echo htmlspecialchars($user['Id']); ?>" method="post" class="user-form">
                        <div class="card-body">
                            <div class="row mb-3">
                                <label class="col-sm-4 col-form-label fw-bold">ID:</label>
                                <div class="col-sm-8">
                                    <p class="form-control-plaintext"><?php echo htmlspecialchars($user['Id']); ?></p>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-4 col-form-label fw-bold">Tên đăng nhập:</label>
                                <div class="col-sm-8">
                                    <p class="form-control-plaintext"><?php echo htmlspecialchars($user['username']); ?></p>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-4 col-form-label fw-bold">Họ và Tên:</label>
                                <div class="col-sm-8">
                                    <p class="form-control-plaintext"><?php echo htmlspecialchars($user['fullname']); ?></p>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-4 col-form-label fw-bold">Email:</label>
                                <div class="col-sm-8">
                                    <p class="form-control-plaintext"><?php echo htmlspecialchars($user['email']); ?></p>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="role" class="col-sm-4 col-form-label fw-bold">Vai trò:</label>
                                <div class="col-sm-8">
                                    <select id="role" name="role" class="form-select" required>
                                        <option value="user" <?php echo ($user['role'] == 'user') ? 'selected' : ''; ?>>User</option>
                                        <option value="admin" <?php echo ($user['role'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save me-2"></i>Cập Nhật Vai Trò
                            </button>
                            <a href="index.php?controller=user&action=index" class="btn btn-secondary">
                                <i class="fas fa-times me-2"></i>Hủy
                            </a>
                        </div>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<style>
    body {
        background-color: #f4f6f9;
    }
    .card {
        border: none;
        border-radius: 10px;
    }
    .card-header {
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        display: flex;
        align-items: center;
    }
    .form-control-plaintext {
        background-color: #f8f9fa;
        padding: 0.375rem 0.75rem;
        border-radius: 4px;
    }
</style>

<?php require_once '../views/layouts/footer.php'; ?>