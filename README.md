# 인포팡팡

CloudPress로 생성된 진짜 WordPress 사이트입니다.

## 구조

```
cp-be32d9c3-site-be32d9c3/
├── worker.js              # Cloudflare Worker (미러링 전용)
├── wrangler.toml          # Worker 배포 설정
├── wp-config.php          # WordPress 설정 (자동 생성)
├── wp-admin/              # WordPress 관리자 (자동 설치)
├── wp-includes/           # WordPress 코어 (자동 설치)
├── wp-content/
│   ├── themes/            # 테마
│   ├── plugins/           # 플러그인 (SQLite 포함)
│   ├── uploads/           # 미디어 업로드
│   └── db.php             # SQLite DB 드롭인
├── _db/
│   └── wordpress.db       # SQLite 데이터베이스 (.db 파일)
└── .github/workflows/
    ├── install-wordpress.yml  # WordPress 전체 설치
    └── deploy-worker.yml      # Worker 자동 배포
```

## 데이터베이스

- **엔진**: SQLite (.db 파일) — Cloudflare D1 사용 안 함
- **위치**: `_db/wordpress.db`
- **관리자**: admin

## 작동 원리

1. **Cloudflare Worker** (`worker.js`)가 모든 요청 수신
2. 정적 자산은 GitHub 레포에서 직접 서빙
3. 동적 요청은 GitHub _cache/ 정적 HTML로 서빙 (GitHub Actions가 생성)
4. php-wasm이 이 레포의 WP 파일 + `_db/wordpress.db` 실행
5. Cloudflare 장애 시 GitHub Pages 정적 폴백 자동 전환

## CloudPress 관리

- **대시보드**: https://cloud-press.co.kr/dashboard
- **사이트 ID**: `be32d9c3-aa66-49f2-9a47-74e6d36cf868`
- **Worker**: `cp-be32d9c3-wp`
- **사이트 URL**: https://cp-be32d9c3-wp.workers.dev
