# PHP Runner (php-wasm)

이 레포지토리의 WordPress 사이트는 **php-wasm**으로 실행됩니다.

## 구조

- worker.js: 메인 Cloudflare Worker (요청 라우팅, KV 캐시)
- php-runner.js: PHP Runner Worker (php-wasm으로 WordPress 직접 실행)
- wrangler.toml: 메인 Worker 설정 (PHP_RUNNER Service Binding 포함)
- wrangler-php.toml: PHP Runner Worker 배포 설정

## 동작 원리

1. 요청 -> worker.js (메인 Worker)
2. KV 캐시 HIT -> 캐시된 HTML 반환
3. KV 캐시 MISS -> PHP_RUNNER Service Binding -> php-runner.js 호출
4. php-runner.js가 WP 코어(CDN) + wp-content(GitHub) -> php-wasm VFS 마운트 -> WordPress 실행
5. PHP 출력 -> KV 캐시 저장 -> 클라이언트 반환

## 배포

```bash
# PHP Runner 먼저 배포
npx wrangler deploy --config wrangler-php.toml

# 메인 Worker 배포 (Service Binding 연결)
npx wrangler deploy
```
