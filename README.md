# CustomLink-Image-Uploader: PNG Edition for ShareX

## Overview

This PHP script enables secure uploading of PNG images via ShareX, applies configurable compression, and generates shareable links using a custom domain. It's designed for seamless integration with ShareX, making it perfect for users looking to automate their image hosting on a personal or professional level.

## Features

- Secure ShareX image uploads with key-based authentication
- Adjustable PNG compression to optimize file size without losing quality
- Shareable custom domain links for easy access and distribution
- Automated directory organization based on upload date

## Configuration

1. **Login Key:** Securely authenticate ShareX uploads with a unique key.
2. **Target Directory:** Define where uploaded images will be stored.
3. **Website URL:** Set the base URL for generating image links.
4. **String Length:** Determine the random string length for filenames.
5. **Max Upload Size:** Specify the maximum image file size allowed.
6. **PNG Compression Level:** Choose compression level from 0 (none) to 9 (maximum).

## Setup for ShareX

1. Configure ShareX with the endpoint URL to this script.
2. Ensure the target directory is correctly set up and permissions allow writing.
3. Use the provided login key in ShareX custom uploader settings.

## Security Considerations

- Keep your login key confidential to prevent unauthorized access.
- Regularly monitor your upload directory for unexpected files.
- Limit upload sizes through server configurations to enhance security.

---
# CustomLink-Image-Uploader: PNG to GIF Edition for ShareX

## Overview

Enhancing the PNG Edition, this script allows for the automatic conversion of PNG images to GIF format when uploaded via ShareX. It combines security, efficiency, and convenience, offering a straightforward solution for users needing to host and share GIF images through a custom domain.

## Features

- Automatic PNG to GIF conversion on upload via ShareX
- Secure upload process with key-based authentication
- Custom domain link generation for sharing and embedding
- Organized file storage in date-based directories

## Configuration

Follows the same configuration steps as the PNG Edition, with added functionality for PNG to GIF conversion without additional setup for this feature.

## Setup for ShareX

1. Set up ShareX to use this script as the endpoint for image uploading.
2. Configure the script settings according to your requirements.
3. Ensure the script and target directory permissions are correctly configured.

## Security Considerations

- The login key must be kept secure to avoid unauthorized use.
- Check the upload directory periodically to ensure it contains only expected files.
- Configure server settings to limit upload size, enhancing the security of the upload process.
