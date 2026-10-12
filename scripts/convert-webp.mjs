import sharp from 'sharp';
import fs from 'fs';
import path from 'path';

const imagesDir = path.resolve('public/images');

if (!fs.existsSync(imagesDir)) {
    fs.mkdirSync(imagesDir, { recursive: true });
}

// Optional: download the team meeting image if not present locally
const teamJpeg = path.join(imagesDir, 'team.jpeg');
if (!fs.existsSync(teamJpeg)) {
    try {
        const response = await fetch('https://images.unsplash.com/photo-1551836022-d5d88e9218df?auto=format&fit=crop&w=1200&q=80');
        if (response.ok) {
            const buffer = await response.arrayBuffer();
            fs.writeFileSync(teamJpeg, Buffer.from(buffer));
            console.log('Downloaded team.jpeg');
        }
    } catch (e) {
        console.warn('Could not download team meeting image from unsplash:', e.message);
    }
}

const files = fs.readdirSync(imagesDir);

for (const file of files) {
    const ext = path.extname(file).toLowerCase();
    if (['.jpg', '.jpeg', '.png'].includes(ext)) {
        const base = path.basename(file, ext);
        const inputPath = path.join(imagesDir, file);
        const outputPath = path.join(imagesDir, `${base}.webp`);
        
        try {
            await sharp(inputPath)
                .webp({ quality: 80, effort: 6 })
                .toFile(outputPath);
            const inStat = fs.statSync(inputPath);
            const outStat = fs.statSync(outputPath);
            console.log(`Converted ${file} (${Math.round(inStat.size / 1024)} KB) -> ${base}.webp (${Math.round(outStat.size / 1024)} KB)`);
        } catch (err) {
            console.error(`Error converting ${file}:`, err.message);
        }
    }
}

console.log('WebP conversion completed successfully!');
