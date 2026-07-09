import { test, expect } from '@playwright/test';
import fs from 'fs';
import path from 'path';

test('Verify Atisoft Website', async ({ page }) => {
  const screenshotsDir = path.join(process.cwd(), 'verification/screenshots');
  if (!fs.existsSync(screenshotsDir)) {
    fs.mkdirSync(screenshotsDir, { recursive: true });
  }

  // Go to the home page
  await page.goto('http://localhost:3000');

  // Wait for the canvas to be ready
  await page.waitForSelector('canvas');
  // Wait a bit for animations to settle
  await page.waitForTimeout(2000);

  // 1. Hero Section
  await page.screenshot({ path: path.join(screenshotsDir, '1_hero.png') });

  // 2. Services Section
  await page.mouse.wheel(0, 1000);
  await page.waitForTimeout(1000);
  await page.screenshot({ path: path.join(screenshotsDir, '2_services.png') });

  // 3. Logos Section
  await page.mouse.wheel(0, 1000);
  await page.waitForTimeout(1000);
  await page.screenshot({ path: path.join(screenshotsDir, '3_logos.png') });

  // 4. Stats Section
  await page.mouse.wheel(0, 1000);
  await page.waitForTimeout(1000);
  await page.screenshot({ path: path.join(screenshotsDir, '4_stats.png') });

  // 5. Portfolio Section
  await page.mouse.wheel(0, 1000);
  await page.waitForTimeout(1000);
  await page.screenshot({ path: path.join(screenshotsDir, '5_portfolio.png') });

  // 6. Final Section (Zoom out)
  await page.mouse.wheel(0, 1000);
  await page.waitForTimeout(2000);
  await page.screenshot({ path: path.join(screenshotsDir, '6_final.png') });
});
