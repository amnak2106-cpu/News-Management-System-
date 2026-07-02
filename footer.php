/* Global Styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Arial', sans-serif;
}

body {
    background-color: #f5f5f5;
    color: #333;
    line-height: 1.6;
    direction: rtl;
}

.container {
    width: 90%;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 15px;
}

a {
    text-decoration: none;
    color: #0066cc;
    transition: color 0.3s;
}

a:hover {
    color: #004499;
}

.btn {
    display: inline-block;
    padding: 10px 20px;
    background-color: #0066cc;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.btn:hover {
    background-color: #004499;
    color: white;
}

.btn-outline {
    background-color: transparent;
    border: 1px solid #0066cc;
    color: #0066cc;
}

.btn-outline:hover {
    background-color: #0066cc;
    color: white;
}

.btn-block {
    display: block;
    width: 100%;
}

/* Header Styles */
header {
    background-color: white;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    padding: 15px 0;
    position: sticky;
    top: 0;
    z-index: 1000;
}

header .container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
}

.logo h1 {
    color: #0066cc;
    font-size: 24px;
}

nav ul {
    display: flex;
    list-style: none;
}

nav ul li {
    margin-left: 20px;
    position: relative;
}

nav ul li a {
    color: #333;
    font-weight: 500;
}

nav ul li a:hover {
    color: #0066cc;
}

.dropdown-menu {
    position: absolute;
    top: 100%;
    right: 0;
    background-color: white;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    border-radius: 4px;
    padding: 10px 0;
    min-width: 150px;
    display: none;
}

.dropdown:hover .dropdown-menu {
    display: block;
}

.dropdown-menu li {
    margin: 0;
    padding: 5px 15px;
}

.search-login {
    display: flex;
    align-items: center;
}

.search-form {
    display: flex;
    margin-left: 15px;
}

.search-form input {
    padding: 8px 15px;
    border: 1px solid #ddd;
    border-radius: 4px 0 0 4px;
    width: 200px;
}

.search-form button {
    background-color: #0066cc;
    color: white;
    border: none;
    border-radius: 0 4px 4px 0;
    padding: 8px 15px;
    cursor: pointer;
}

.search-form button:hover {
    background-color: #004499;
}

.auth-buttons {
    display: flex;
    gap: 10px;
}

.user-menu {
    position: relative;
    cursor: pointer;
}

.user-menu ul {
    position: absolute;
    top: 100%;
    right: 0;
    background-color: white;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    border-radius: 4px;
    padding: 10px 0;
    min-width: 150px;
    display: none;
}

.user-menu:hover ul {
    display: block;
}

.user-menu ul li {
    padding: 5px 15px;
}

/* Main Content Styles */
main {
    display: flex;
    margin: 30px 0;
    gap: 30px;
}

main > section {
    flex: 2;
}

main > aside {
    flex: 1;
}

/* Breaking News Section */
.breaking-news {
    margin-bottom: 30px;
}

.breaking-news h2 {
    margin-bottom: 15px;
    padding-bottom: 10px;
    border-bottom: 2px solid #0066cc;
}

.breaking-news-slider {
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

.breaking-news-item {
    display: flex;
    flex-direction: column;
}

.breaking-news-item img {
    width: 100%;
    height: 300px;
    object-fit: cover;
}

.breaking-news-content {
    padding: 20px;
}

.breaking-news-content .category {
    display: inline-block;
    background-color: #0066cc;
    color: white;
    padding: 3px 10px;
    border-radius: 4px;
    font-size: 14px;
    margin-bottom: 10px;
}

.breaking-news-content h3 {
    font-size: 20px;
    margin-bottom: 10px;
}

.breaking-news-content h3 a {
    color: #333;
}

.breaking-news-content h3 a:hover {
    color: #0066cc;
}

/* Featured Articles */
.featured-articles h2 {
    margin-bottom: 15px;
    padding-bottom: 10px;
    border-bottom: 2px solid #0066cc;
}

.articles-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 20px;
}

.article-card {
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.3s, box-shadow 0.3s;
}

.article-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

.article-card img {
    width: 100%;
    height: 180px;
    object-fit: cover;
}

.article-content {
    padding: 15px;
}

.article-content .category {
    display: inline-block;
    background-color: #0066cc;
    color: white;
    padding: 3px 10px;
    border-radius: 4px;
    font-size: 12px;
    margin-bottom: 10px;
}

.article-content h3 {
    font-size: 18px;
    margin-bottom: 10px;
}

.article-content h3 a {
    color: #333;
}

.article-content h3 a:hover {
    color: #0066cc;
}

.article-content p {
    color: #666;
    font-size: 14px;
    margin-bottom: 15px;
}

.article-meta {
    display: flex;
    justify-content: space-between;
    font-size: 12px;
    color: #888;
}

/* Latest News */
.latest-news h2 {
    margin: 30px 0 15px;
    padding-bottom: 10px;
    border-bottom: 2px solid #0066cc;
}

.news-list {
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.news-item {
    display: flex;
    padding: 20px;
    border-bottom: 1px solid #eee;
}

.news-item:last-child {
    border-bottom: none;
}

.news-image {
    flex: 0 0 200px;
    margin-left: 20px;
}

.news-image img {
    width: 100%;
    height: 120px;
    object-fit: cover;
    border-radius: 4px;
}

.news-content {
    flex: 1;
}

.news-content h3 {
    font-size: 18px;
    margin-bottom: 10px;
}

.news-content h3 a {
    color: #333;
}

.news-content h3 a:hover {
    color: #0066cc;
}

.news-content p {
    color: #666;
    margin-bottom: 15px;
}

.news-meta {
    display: flex;
    gap: 15px;
    font-size: 14px;
    color: #888;
}

/* Sidebar */
.sidebar {
    position: sticky;
    top: 100px;
    height: fit-content;
}

.trending-news, .advertisement {
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    padding: 20px;
    margin-bottom: 20px;
}

.trending-news h3, .advertisement h3 {
    margin-bottom: 15px;
    padding-bottom: 10px;
    border-bottom: 1px solid #eee;
}

.trending-news ul {
    list-style: none;
}

.trending-news li {
    padding: 10px 0;
    border-bottom: 1px solid #eee;
}

.trending-news li:last-child {
    border-bottom: none;
}

.trending-news li a {
    color: #333;
    display: block;
    margin-bottom: 5px;
}

.trending-news li a:hover {
    color: #0066cc;
}

.trending-date {
    font-size: 12px;
    color: #888;
}

.ad-content {
    text-align: center;
    padding: 30px 0;
    background-color: #f9f9f9;
    border-radius: 4px;
}

/* Single Article Page */
.single-article {
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    padding: 30px;
    margin-bottom: 30px;
}

.article-header {
    margin-bottom: 20px;
}

.article-header .category {
    display: inline-block;
    background-color: #0066cc;
    color: white;
    padding: 5px 15px;
    border-radius: 4px;
    font-size: 14px;
    margin-bottom: 15px;
}

.article-header h1 {
    font-size: 28px;
    margin-bottom: 15px;
}

.article-meta {
    display: flex;
    gap: 15px;
    color: #888;
    font-size: 14px;
}

.article-image {
    margin-bottom: 20px;
}

.article-image img {
    width: 100%;
    max-height: 500px;
    object-fit: cover;
    border-radius: 8px;
}

.article-content {
    line-height: 1.8;
    margin-bottom: 30px;
}

.article-content p {
    margin-bottom: 20px;
}

.article-tags {
    margin-bottom: 30px;
}

.article-tags a {
    display: inline-block;
    background-color: #f5f5f5;
    padding: 5px 10px;
    border-radius: 4px;
    margin-left: 5px;
    font-size: 14px;
}

.article-share {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 15px 0;
    border-top: 1px solid #eee;
    border-bottom: 1px solid #eee;
    margin-bottom: 30px;
}

.article-share a {
    display: inline-block;
    width: 40px;
    height: 40px;
    line-height: 40px;
    text-align: center;
    background-color: #f5f5f5;
    border-radius: 50%;
    color: #333;
    transition: all 0.3s;
}

.article-share a:hover {
    background-color: #0066cc;
    color: white;
}

/* Comments Section */
.comments-section {
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    padding: 30px;
}

.comments-section h3 {
    margin-bottom: 20px;
    padding-bottom: 10px;
    border-bottom: 1px solid #eee;
}

.add-comment textarea {
    width: 100%;
    padding: 15px;
    border: 1px solid #ddd;
    border-radius: 4px;
    margin-bottom: 15px;
    min-height: 100px;
}

.login-to-comment {
    background-color: #f9f9f9;
    padding: 15px;
    border-radius: 4px;
    margin-bottom: 20px;
    text-align: center;
}

.comments-list {
    margin-top: 30px;
}

.comment {
    padding: 20px 0;
    border-bottom: 1px solid #eee;
}

.comment:last-child {
    border-bottom: none;
}

.comment-header {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
    font-size: 14px;
}

.comment-author {
    font-weight: bold;
}

.comment-date {
    color: #888;
}

.comment-content {
    line-height: 1.6;
}

/* Auth Forms */
.auth-form {
    max-width: 500px;
    margin: 50px auto;
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    padding: 30px;
}

.auth-form h2 {
    margin-bottom: 20px;
    text-align: center;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    font-weight: 500;
}

.form-group input {
    width: 100%;
    padding: 10px 15px;
    border: 1px solid #ddd;
    border-radius: 4px;
}

.alert {
    padding: 15px;
    margin-bottom: 20px;
    border-radius: 4px;
}

.alert-danger {
    background-color: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
}

.auth-links {
    margin-top: 20px;
    text-align: center;
}

/* Search Results */
.search-results {
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    padding: 30px;
    margin-bottom: 30px;
}

.search-results h2 {
    margin-bottom: 20px;
    padding-bottom: 10px;
    border-bottom: 1px solid #eee;
}

.search-result-item {
    padding: 20px 0;
    border-bottom: 1px solid #eee;
}

.search-result-item:last-child {
    border-bottom: none;
}

.search-result-item h3 {
    font-size: 20px;
    margin-bottom: 10px;
}

.search-result-item h3 a {
    color: #333;
}

.search-result-item h3 a:hover {
    color: #0066cc;
}

.search-result-item p {
    color: #666;
    margin-bottom: 15px;
}

.search-meta {
    display: flex;
    gap: 15px;
    font-size: 14px;
    color: #888;
}

/* Pagination */
.pagination {
    display: flex;
    justify-content: center;
    margin-top: 30px;
    gap: 5px;
}

.pagination a {
    display: inline-block;
    padding: 8px 15px;
    background-color: white;
    border: 1px solid #ddd;
    border-radius: 4px;
    color: #333;
}

.pagination a:hover {
    background-color: #0066cc;
    color: white;
    border-color: #0066cc;
}

.pagination a.active {
    background-color: #0066cc;
    color: white;
    border-color: #0066cc;
}

/* Footer */
footer {
    background-color: #222;
    color: #fff;
    padding: 50px 0 20px;
}

.footer-content {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 30px;
    margin-bottom: 30px;
}

.footer-section h3 {
    color: #fff;
    margin-bottom: 20px;
    font-size: 18px;
}

.footer-section p {
    color: #bbb;
    margin-bottom: 15px;
}

.footer-section ul {
    list-style: none;
}

.footer-section ul li {
    margin-bottom: 10px;
}

.footer-section ul li a {
    color: #bbb;
}

.footer-section ul li a:hover {
    color: #fff;
}

.social-icons {
    display: flex;
    gap: 15px;
    margin-top: 20px;
}

.social-icons a {
    display: inline-block;
    width: 40px;
    height: 40px;
    line-height: 40px;
    text-align: center;
    background-color: #333;
    border-radius: 50%;
    color: #fff;
    transition: all 0.3s;
}

.social-icons a:hover {
    background-color: #0066cc;
}

.footer-bottom {
    text-align: center;
    padding-top: 20px;
    border-top: 1px solid #444;
    color: #bbb;
    font-size: 14px;
}

/* Responsive Design */
@media (max-width: 992px) {
    main {
        flex-direction: column;
    }
    
    .sidebar {
        position: static;
        margin-top: 30px;
    }
}

@media (max-width: 768px) {
    header .container {
        flex-direction: column;
        gap: 15px;
    }
    
    nav ul {
        flex-wrap: wrap;
        justify-content: center;
    }
    
    nav ul li {
        margin: 0 10px 10px;
    }
    
    .search-login {
        width: 100%;
        justify-content: center;
    }
    
    .news-item {
        flex-direction: column;
    }
    
    .news-image {
        margin-left: 0;
        margin-bottom: 15px;
    }
}

@media (max-width: 576px) {
    .container {
        width: 95%;
    }
    
    .articles-grid {
        grid-template-columns: 1fr;
    }
    
    .auth-form {
        padding: 20px;
    }
}

