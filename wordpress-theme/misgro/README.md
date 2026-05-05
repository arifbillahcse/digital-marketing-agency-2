# MISGRO WordPress Theme

A custom WordPress theme built from static HTML, preserving 100% of the original design, animations, and functionality. This theme converts the MISGRO digital marketing agency website into a fully functional WordPress installation.

## Overview

**Theme Name:** MISGRO  
**Version:** 1.0.0  
**Author:** Digital Marketing Agency Team  
**License:** GPL v2 or later  
**Requires WordPress:** 5.8 or higher  
**Requires PHP:** 7.4 or higher  

## Theme Architecture

This theme uses METHOD 3 implementation: **Static HTML in WordPress**

All original HTML, CSS, and JavaScript are preserved exactly as they were in the static version. The theme wraps this content in WordPress templates while maintaining complete design fidelity.

### Key Features

- ✅ 100% preserved original design and animations
- ✅ All CSS and JavaScript functionality maintained
- ✅ Dynamic WordPress URL generation
- ✅ Responsive and mobile-optimized
- ✅ SEO-friendly structure
- ✅ Custom menu registration
- ✅ Clean, maintainable code

## Installation

### 1. Upload Theme

Upload the `misgro` theme folder to:
```
/wp-content/themes/misgro/
```

### 2. Activate Theme

In WordPress Admin:
- Go to **Appearance → Themes**
- Find "MISGRO"
- Click **Activate**

### 3. Create Required Pages

Create the following pages in WordPress Admin (**Pages → Add New**) with these exact slugs:

| Page Title | Slug | Template |
|-----------|------|----------|
| Home | (homepage) | front-page.php |
| Services | `services` | page-services.php |
| About | `about` | page-about.php |
| Why Choose Us | `why-choose-us` | page-why-choose-us.php |
| Contact | `contact` | page-contact.php |
| Portfolio | `portfolio` | page-portfolio.php |

**Important:** WordPress will automatically select the correct template based on the page slug. Do not manually select templates.

### 4. Set Homepage

In WordPress Admin:
- Go to **Settings → Reading**
- Set "Your homepage displays" to **A static page**
- Select the "Home" page as the homepage
- Click **Save Changes**

### 5. Create Navigation Menu (Optional)

If you want to use WordPress menus:
1. Go to **Appearance → Menus**
2. Create a menu called "Main Navigation"
3. Add pages to the menu
4. Assign to "Header Navigation" location

The header currently uses static HTML links, but this can be updated to use dynamic WordPress menus if needed.

## Theme Structure

```
misgro/
├── style.css                 # Theme metadata and primary stylesheet
├── functions.php             # Theme functionality and hooks
├── header.php                # Site header with navigation
├── footer.php                # Site footer
├── front-page.php            # Homepage template
├── page-services.php         # Services page template
├── page-about.php            # About page template
├── page-contact.php          # Contact page template
├── page-why-choose-us.php    # Why Choose Us page template
├── page-portfolio.php        # Portfolio/Case Studies page template
├── page.php                  # Fallback page template
├── single.php                # Fallback single post template
├── index.php                 # Fallback archive/blog template
├── 404.php                   # Error 404 page template
├── assets/
│   ├── css/
│   │   └── styles.css        # Main stylesheet (137KB)
│   └── js/
│       └── app.js            # Main JavaScript file (30KB)
├── img/                      # All website images
│   ├── misgro.png
│   ├── CEO.jpeg
│   └── ... (other images)
└── README.md                 # This file
```

## File Descriptions

### Core Theme Files

**style.css**
- Theme metadata and information
- Must contain `Theme Name`, `Version`, and other header comments

**functions.php**
- Theme setup and configuration
- Enqueues stylesheets and JavaScript
- Registers custom menus
- Defines helper functions:
  - `misgro_setup()` - Initialize theme support
  - `misgro_enqueue_assets()` - Load CSS and JS
  - `misgro_active_class($page)` - Get active menu class
  - `misgro_page_url($slug)` - Get dynamic page URL
  - `misgro_resource_hints()` - Performance optimization

**header.php**
- Contains `<!DOCTYPE html>` and opening tags
- Includes WordPress `wp_head()` hook
- Contains site navigation with dynamic URLs
- Mobile menu markup

**footer.php**
- Contains footer markup
- Includes WordPress `wp_footer()` hook
- Footer navigation and company info

### Page Templates

**front-page.php** (Homepage)
- Main landing page with hero section
- Marquee section, services overview, testimonials
- FAQ section and contact CTA

**page-services.php**
- Services overview page
- Sticky tabs for service categories
- Detailed service cards with descriptions

**page-about.php**
- Company story and team showcase
- Team member profiles with images
- Mission, vision, and values

**page-contact.php**
- Contact form
- Business contact information
- "How It Works" section

**page-why-choose-us.php**
- Key differentiators and features
- Performance metrics and stats
- Client testimonials

**page-portfolio.php**
- Case studies and project portfolio
- Client logos and results
- Interactive case study modals

### Fallback Templates

**page.php** - Fallback for pages without specific templates  
**single.php** - Fallback for blog posts  
**index.php** - Fallback for archives and blog listing  
**404.php** - Error page for missing content  

## Customization

### Modifying Links

All internal links use the `misgro_page_url()` function for dynamic URL generation:

```php
// Old static link:
<a href="/services">Services</a>

// New WordPress link:
<a href="<?php echo esc_url( misgro_page_url( 'services' ) ); ?>">Services</a>
```

### Updating Images

Images are stored in `/img/` folder. Reference them with:

```php
<img src="<?php echo get_template_directory_uri(); ?>/img/image-name.jpg" alt="Description">
```

### Adding Custom CSS

Add custom styles to the bottom of `assets/css/styles.css` or create a new stylesheet and enqueue it in `functions.php`.

### Modifying Navigation

Edit the navigation menu in:
- **Static version:** `header.php` lines 15-40
- **WordPress menus:** Use Admin → Appearance → Menus

## Assets

### CSS Files
- `assets/css/styles.css` - Main stylesheet (137KB)
  - All original styling preserved
  - Responsive design included
  - Animation effects maintained

### JavaScript Files
- `assets/js/app.js` - Main application script (30KB)
  - Smooth scroll animations
  - Interactive elements
  - Mobile menu functionality

### Images
All images stored in `img/` folder:
- Logo and branding
- Team member photos
- Project screenshots
- Client logos

## Performance

The theme includes performance optimization:

1. **Resource Hints** - Preconnect to Google Fonts and other CDNs
2. **Lazy Loading** - Images load on demand
3. **CSS/JS Optimization** - Files properly enqueued and combined
4. **Caching** - Compatible with WordPress caching plugins

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers (iOS Safari, Chrome Mobile)

## Troubleshooting

### Pages Show Default Template

**Issue:** Pages are not using their specific templates  
**Solution:** Ensure WordPress pages have correct slugs:
- `services` → page-services.php
- `about` → page-about.php
- `why-choose-us` → page-why-choose-us.php
- `contact` → page-contact.php
- `portfolio` → page-portfolio.php

### Images Not Displaying

**Issue:** Images appear broken on pages  
**Solution:**
1. Check that image files exist in `/img/` folder
2. Verify paths use `get_template_directory_uri()`
3. Check file permissions (644 for images)

### Styles or JavaScript Not Working

**Issue:** Page displays without styling or interactivity  
**Solution:**
1. Clear browser cache (Ctrl+F5 or Cmd+Shift+R)
2. Check WordPress Settings → Permalinks (may need to refresh)
3. Verify `functions.php` is properly saved
4. Check browser console for JavaScript errors

### Links Not Working

**Issue:** Internal links are broken  
**Solution:**
1. Ensure all pages are created with correct slugs
2. Verify homepage is set in Settings → Reading
3. Use `misgro_page_url()` function for all internal links

## Development

### Adding New Pages

1. Create page in WordPress Admin with desired slug
2. Create new template file: `page-{slug}.php`
3. Add required HTML content
4. WordPress will automatically use this template

Example:
```php
<?php
/**
 * Template Name: Custom Page
 * Template Slug: custom-page
 */
get_header();
?>

<!-- Page content here -->

<?php get_footer(); ?>
```

### Modifying Existing Pages

Edit the corresponding page template file in the theme:
- `/page-{slug}.php` for page templates
- `/front-page.php` for homepage
- Keep all styling and animations intact

## Support & Maintenance

For issues or questions:
1. Check the troubleshooting section above
2. Verify WordPress version is 5.8 or higher
3. Check that PHP version is 7.4 or higher
4. Clear WordPress transients and caches

## License

This theme is released under the GPL v2 or later license. You are free to use, modify, and distribute this theme as per GPL terms.

## Credits

- Original HTML/CSS Design: Digital Marketing Agency Team
- WordPress Integration: Claude Code
- Built with: WordPress, PHP, HTML5, CSS3, JavaScript

---

**Version 1.0.0** | Last Updated: May 2026
