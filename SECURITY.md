# Security Guidelines

## Protecting Your Credentials

### Never Commit Sensitive Data

**CRITICAL**: Never commit your actual credentials to version control. This includes:

- `.env` files with real API keys or passwords
- Any files containing SMTP credentials
- API keys or tokens
- Personal email addresses used in testing

### What's Protected

The `.gitignore` files in this project are configured to exclude:

```
.env
.env.local
.env.*.local
vendor/
```

### Before Publishing or Committing

1. **Verify .gitignore is working**:
   ```bash
   git status
   ```
   Your `.env` files should NOT appear in the list

2. **Check for hardcoded credentials**:
   ```bash
   grep -r "kms_\|ak_\|sk_" --include="*.php" --include="*.json" .
   ```
   This should only return placeholder values in `.env.example` files

3. **Use environment variables**:
   All examples use `$_ENV['VARIABLE_NAME']` - never hardcode credentials

### Safe Configuration Files

The `.env.example` files contain **placeholder values only**:

```env
API_KEY=kms_xxxx
SMTP_USER=xxxxx
SMTP_PASSWORD=xxxxx
```

These are safe to commit and help users understand required configuration.

### If You Accidentally Commit Credentials

1. **Immediately revoke** the exposed credentials in your Keplers.email dashboard
2. **Remove** them from git history (use tools like `git-filter-repo`)
3. **Generate new** credentials
4. **Never** just delete the file - git history retains it

### Reporting Security Issues

If you discover a security vulnerability in these examples, please report it by:
- Opening a GitHub issue (for non-sensitive issues)
- Contacting the repository maintainer directly (for sensitive issues)

## Best Practices

- ✅ Use `.env` files for local development
- ✅ Use environment variables in production
- ✅ Keep credentials in secure vaults (1Password, AWS Secrets Manager, etc.)
- ✅ Rotate credentials regularly
- ❌ Never share credentials in chat, email, or screenshots
- ❌ Never commit `.env` files
- ❌ Never hardcode credentials in source code
