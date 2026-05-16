<?php
/**
 * WordPress 기본 설정 파일
 * CloudPress 자동 생성 — 직접 수정하지 마세요
 * 데이터베이스: SQLite (_db/wordpress.db — GitHub 레포 저장)
 */

// ── SQLite 데이터베이스 설정 ──────────────────────────────────────────────────
// D1(Cloudflare) 대신 GitHub 레포 내 SQLite .db 파일 사용
// db.php 드롭인(wp-content/db.php)이 SQLite 연결을 처리합니다.
define( 'DB_NAME',     'be32d9c3-aa66-49f2-9a47-74e6d36cf868_wp' );
define( 'DB_USER',     'cloudpress' );
define( 'DB_PASSWORD', '' );
define( 'DB_HOST',     'localhost' );
define( 'DB_CHARSET',  'utf8mb4' );
define( 'DB_COLLATE',  '' );

// ── SQLite 플러그인 설정 ──────────────────────────────────────────────────────
// wp-content/db.php (SQLite Database Integration 드롭인)
define( 'SQLITE_DB_DIR',  ABSPATH . '_db/' );   // GitHub 레포 내 _db/ 폴더
define( 'SQLITE_DB_FILE', 'wordpress.db' );      // .db 확장자 (D1 금지)

// ── 인증 키 & 솔트 ──────────────────────────────────────────────────────────
define( 'AUTH_KEY',         'tn2dlhynlkw1hkrxb3mjj30ih8ir6by4nupx9yb3x0tm0l3hpuhlfsp81h7k1i93' );
define( 'SECURE_AUTH_KEY',  'dv0pod80z1qi0t9f8j94793r5wtwipudayba94dki31btyzab430q92jbk88hbua' );
define( 'LOGGED_IN_KEY',    'txdbqblzuwaxuxqe89zkepadmxpnkppd65zbpv8o7s5nip68xpfco0rvtvjdu2ac' );
define( 'NONCE_KEY',        'mzfqitu1ztikogd5du1l5l6049dnytjzu4xjpiaz7xnvz1z6tpx4odq3kx48oue5' );
define( 'AUTH_SALT',        'e6gujcrgsz8xazcwjm8a6ejsct9i3ye5pvpcohdzp3okznwdtgujzpjko9rsf3du' );
define( 'SECURE_AUTH_SALT', 'h5pghvkfo1d8bsbsf9wm6pa5wagg3mrn7cxvmz03lxi1vc9d7e7hyz855pt6c26m' );
define( 'LOGGED_IN_SALT',   'sinkdngbkqzqa39t1cwjct15k9ke82fqk2ebjg2c6jgd5mj9l9xupzft0wldouv5' );
define( 'NONCE_SALT',       'pb61khr49m2ofryo6scwxjbzk9klttobydfggmzgppmmgllafor75yb440lznzme' );

// ── CloudPress 전용 설정 ─────────────────────────────────────────────────────
define( 'CP_SITE_ID', getenv('CP_SITE_ID') ?: 'be32d9c3-aa66-49f2-9a47-74e6d36cf868' );
define( 'CP_GITHUB_OWNER',  getenv('CP_GITHUB_OWNER')  ?: '' );
define( 'CP_GITHUB_REPO',   getenv('CP_GITHUB_REPO')   ?: '' );
define( 'CP_GITHUB_TOKEN',  getenv('CP_GITHUB_TOKEN')  ?: '' );

// ── 테이블 접두사 ────────────────────────────────────────────────────────────
$table_prefix = 'wp_';

// ── 절대 경로 ───────────────────────────────────────────────────────────────
if ( ! defined( 'ABSPATH' ) ) {
    define( 'ABSPATH', __DIR__ . '/' );
}

// ── 디버그 설정 ─────────────────────────────────────────────────────────────
define( 'WP_DEBUG',         false );
define( 'WP_DEBUG_LOG',     false );
define( 'WP_DEBUG_DISPLAY', false );

// ── 보안 설정 ───────────────────────────────────────────────────────────────
define( 'DISALLOW_FILE_EDIT', true );

// ── 업로드 경로 ──────────────────────────────────────────────────────────────
define( 'UPLOADS', 'wp-content/uploads' );

// ── WordPress 설정 로드 ──────────────────────────────────────────────────────
require_once ABSPATH . 'wp-settings.php';
