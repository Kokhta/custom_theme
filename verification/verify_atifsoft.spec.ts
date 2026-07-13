import { test, expect } from '@playwright/test';

test('Atisoft 3D website loads and scrolls', async ({ page }) => {
  await page.goto('http://localhost:3000');

  // Wait for the canvas to be present
  const canvas = page.locator('canvas');
  await expect(canvas).toBeVisible();

  // Check for Persian text in the UI
  await expect(page.locator('text=آتی‌سافت')).toBeVisible();
  await expect(page.locator('text=اسکرول کنید')).toBeVisible();

  // Take a screenshot of the hero section
  await page.screenshot({ path: 'verification/hero.png' });

  // Scroll down to the services section (approx 25% scroll)
  await page.mouse.wheel(0, 1500);
  await page.waitForTimeout(1000); // Wait for animations
  await page.screenshot({ path: 'verification/services.png' });

  // Scroll down to the clients section (approx 45% scroll)
  await page.mouse.wheel(0, 1500);
  await page.waitForTimeout(1000);
  await page.screenshot({ path: 'verification/clients.png' });

  // Scroll to the end
  await page.mouse.wheel(0, 4000);
  await page.waitForTimeout(2000);
  await page.screenshot({ path: 'verification/footer.png' });
});
