# Contributing to Keplers.email Examples

Thank you for your interest in contributing to the Keplers.email PHP examples!

## How to Contribute

### Reporting Issues

- Use GitHub Issues to report bugs or suggest improvements
- Provide clear reproduction steps
- Include your PHP version and OS
- Share error messages and logs (with credentials removed)

### Submitting Changes

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/your-feature`)
3. Make your changes
4. Test thoroughly
5. Commit with clear messages
6. Push to your fork
7. Open a Pull Request

## Development Guidelines

### Code Style

- Use consistent indentation (4 spaces)
- Follow PSR-12 coding standards
- Add comments for complex logic
- Keep functions focused and small

### Testing Your Changes

Before submitting:

1. **Install dependencies**:
   ```bash
   composer install
   ```

2. **Test with placeholder credentials**:
   ```bash
   cp .env.example .env
   ```

3. **Verify code runs**:
   ```bash
   php index.php
   ```

4. **Check for errors**:
   - Syntax errors
   - Runtime errors
   - PHP warnings and notices

### Security Requirements

**CRITICAL**: Before committing:

- ✅ Never commit `.env` files with real credentials
- ✅ Use placeholder values in `.env.example`
- ✅ Use `$_ENV` for all configuration
- ✅ Review changes with `git diff`
- ✅ Verify `.gitignore` is working

### Documentation

- Update README files if behavior changes
- Add code comments for complex logic
- Include examples for new features
- Update environment variable tables

### Commit Messages

Use clear, descriptive commit messages:

```
Add email template example with attachments

- Implement template variable substitution
- Add attachment handling
- Update README with new example
```

### What We're Looking For

**Welcomed Contributions**:
- Bug fixes
- Documentation improvements
- Additional email examples
- Error handling improvements
- New API endpoint examples
- Performance optimizations

**Please Avoid**:
- Breaking changes without discussion
- Unrelated feature additions
- Reformatting existing code
- Changes to dependencies without justification

## Questions?

Feel free to open an issue for questions about:
- How to implement a feature
- Whether a contribution would be accepted
- Technical decisions in the codebase

## License

By contributing, you agree that your contributions will be licensed under the same MIT License that covers this project.
