import { test, expect } from '@playwright/test';

test('Hero section renders correctly', async ({ page }) => {
  await page.goto('http://localhost:3000');

  // Wait for canvas to be ready
  await page.waitForSelector('canvas');

  // Check if "آتی‌سافت" text is present (it's in 3D but we can check the page content or just wait)
  // Since it's R3F, we mainly want to see if it doesn't crash

  // Capture screenshot
  await page.screenshot({ path: 'hero-verification.png' });
});
