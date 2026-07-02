/* أساسيات التنسيق */
:root {
  --primary-color: #2c3e50;
  --secondary-color: #3498db;
  --danger-color: #e74c3c;
  --success-color: #2ecc71;
  --warning-color: #f39c12;
  --light-bg: #f5f5f5;
  --dark-text: #333;
  --light-text: #fff;
}

body {
  font-family: "Tajawal", "Tahoma", Arial, sans-serif;
  margin: 0;
  padding: 0;
  background-color: var(--light-bg);
  color: var(--dark-text);
  direction: ltr;
}

.admin-container {
  display: flex;
  min-height: 100vh;
}

.admin-sidebar {
  width: 250px;
  background: var(--primary-color);
  color: var(--light-text);
  padding: 20px 0;
  box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
}

.admin-sidebar h3 {
  text-align: center;
  padding: 15px;
  margin: 0;
  border-bottom: 1px solid #34495e;
  font-size: 1.2rem;
}

.admin-sidebar ul {
  list-style: none;
  padding: 0;
  margin: 20px 0;
}

.admin-sidebar li a {
  display: flex;
  align-items: center;
  padding: 12px 20px;
  color: var(--light-text);
  text-decoration: none;
  transition: all 0.3s;
}

.admin-sidebar li a i {
  margin-left: 10px;
  width: 20px;
  text-align: center;
}

.admin-sidebar li a:hover {
  background: #34495e;
  padding-right: 25px;
}

.admin-content {
  flex: 1;
  padding: 30px;
  background-color: #fff;
  box-shadow: 0 0 15px rgba(0, 0, 0, 0.05);
}

/* بطاقات الإحصائيات */
.stats-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 20px;
  margin: 30px 0;
}

.stat-card {
  background: #fff;
  border-radius: 8px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  display: flex;
  align-items: center;
  padding: 20px;
  transition: transform 0.3s;
}

.stat-card:hover {
  transform: translateY(-5px);
}

.stat-icon {
  width: 60px;
  height: 60px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-left: 15px;
  color: white;
  font-size: 1.5rem;
}

.stat-info h3 {
  margin: 0 0 5px 0;
  font-size: 1rem;
  color: #666;
}

.stat-info p {
  margin: 0;
  font-size: 1.8rem;
  font-weight: bold;
  color: var(--dark-text);
}

/* الجداول */
.table-container {
  overflow-x: auto;
  margin: 30px 0;
}

table {
  width: 100%;
  border-collapse: collapse;
  margin: 20px 0;
  font-size: 0.9rem;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
}

table th {
  background-color: var(--primary-color);
  color: white;
  text-align: right;
  padding: 12px 15px;
}

table td {
  padding: 12px 15px;
  border-bottom: 1px solid #ddd;
}

table tr:last-child td {
  border-bottom: none;
}

table tr:hover {
  background-color: #f9f9f9;
}

/* الأزرار */
.btn {
  display: inline-block;
  padding: 8px 15px;
  border-radius: 4px;
  text-decoration: none;
  font-size: 0.9rem;
  transition: all 0.3s;
  border: none;
  cursor: pointer;
}

.btn-sm {
  padding: 5px 10px;
  font-size: 0.8rem;
}

.btn-outline {
  background: transparent;
  border: 1px solid var(--secondary-color);
  color: var(--secondary-color);
}

.btn-outline:hover {
  background: var(--secondary-color);
  color: white;
}

.btn-primary {
  background: var(--secondary-color);
  color: white;
}

.btn-success {
  background: var(--success-color);
  color: white;
}

.btn-danger {
  background: var(--danger-color);
  color: white;
}

.btn-warning {
  background: var(--warning-color);
  color: white;
}

/* رسائل التنبيه */
.alert {
  padding: 15px;
  margin-bottom: 20px;
  border-radius: 4px;
}

.alert-success {
  background-color: #d4edda;
  color: #155724;
  border: 1px solid #c3e6cb;
}

.alert-danger {
  background-color: #f8d7da;
  color: #721c24;
  border: 1px solid #f5c6cb;
}

/* التنسيق العام */
h2 {
  color: var(--primary-color);
  margin-top: 0;
  padding-bottom: 15px;
  border-bottom: 1px solid #eee;
}

/* تصميم متجاوب */
@media (max-width: 768px) {
  .admin-container {
    flex-direction: column;
  }

  .admin-sidebar {
    width: 100%;
    padding: 10px 0;
  }

  .stats-grid {
    grid-template-columns: 1fr;
  }

  .admin-content {
    padding: 20px 15px;
  }
}

/* تنسيقات إضافية لإدارة المستخدمين */
.role-badge {
  padding: 4px 8px;
  border-radius: 4px;
  font-size: 0.8rem;
  font-weight: bold;
}

.role-badge.admin {
  background-color: #4caf50;
  color: white;
}

.role-badge.user {
  background-color: #2196f3;
  color: white;
}

.user-form {
  max-width: 600px;
  margin: 20px auto;
  background: #fff;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.user-form .form-group {
  margin-bottom: 15px;
}

.user-form label {
  display: block;
  margin-bottom: 5px;
  font-weight: bold;
}

.user-form input[type="text"],
.user-form input[type="email"],
.user-form input[type="password"],
.user-form select {
  width: 100%;
  padding: 8px;
  border: 1px solid #ddd;
  border-radius: 4px;
}

/* تنسيقات قسم التعليقات */
.comments-section {
    margin-top: 40px;
    padding: 20px;
    background: #f9f9f9;
    border-radius: 8px;
}

.comments-section h3 {
    margin-top: 0;
    padding-bottom: 15px;
    border-bottom: 1px solid #eee;
}

.add-comment {
    margin-bottom: 30px;
}

.add-comment textarea {
    width: 100%;
    padding: 15px;
    border: 1px solid #ddd;
    border-radius: 4px;
    min-height: 100px;
    margin-bottom: 10px;
    font-family: inherit;
}

.comments-list {
    margin-top: 20px;
}

.comment {
    padding: 15px;
    margin-bottom: 20px;
    background: #fff;
    border-radius: 4px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.05);
}

.comment-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
    padding-bottom: 10px;
    border-bottom: 1px solid #f0f0f0;
}

.comment-author {
    font-weight: bold;
    color: #333;
}

.comment-date {
    color: #777;
    font-size: 0.9em;
}

.comment-actions {
    margin-right: auto;
    margin-left: 15px;
}

.comment-content {
    line-height: 1.6;
}

.login-to-comment {
    background: #fff8e1;
    padding: 15px;
    border-radius: 4px;
    text-align: center;
}

.login-to-comment a {
    color: #ff9800;
    font-weight: bold;
}

@media (max-width: 768px) {
    .comment-header {
        flex-direction: column;
        align-items: flex-start;
    }
    
    .comment-date {
        margin-top: 5px;
    }
}

/* تنسيقات جدول التعليقات */
.comments-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.comments-table th {
    background-color: #2c3e50;
    color: white;
    padding: 12px;
    text-align: right;
}

.comments-table td {
    padding: 12px;
    border-bottom: 1px solid #ddd;
}

.comments-table tr:hover {
    background-color: #f5f5f5;
}

.comments-table a {
    color: #3498db;
    text-decoration: none;
}

.comments-table a:hover {
    text-decoration: underline;
}

.actions {
    white-space: nowrap;
}