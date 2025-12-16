#!/bin/bash

echo "======================================"
echo "Security Verification for PHP Examples"
echo "======================================"
echo ""

ISSUES=0

echo "[1/6] Checking for .env files..."
if find . -name ".env" -type f | grep -q .; then
    echo "❌ FAIL: Found .env files:"
    find . -name ".env" -type f
    ISSUES=$((ISSUES + 1))
else
    echo "✅ PASS: No .env files found"
fi
echo ""

echo "[2/6] Checking for vendor directories..."
if find . -name "vendor" -type d | grep -q .; then
    echo "⚠️  WARNING: Found vendor directories (should be in .gitignore):"
    find . -name "vendor" -type d
else
    echo "✅ PASS: No vendor directories found"
fi
echo ""

echo "[3/6] Checking for hardcoded API keys in PHP files..."
if grep -r "kms_[a-zA-Z0-9]\{20,\}" --include="*.php" . 2>/dev/null | grep -v "kms_xxxx"; then
    echo "❌ FAIL: Found potential hardcoded API keys"
    ISSUES=$((ISSUES + 1))
else
    echo "✅ PASS: No hardcoded API keys found"
fi
echo ""

echo "[4/6] Checking for hardcoded passwords in PHP files..."
if grep -r "password.*=.*['\"][^$_ENV]" --include="*.php" . 2>/dev/null | grep -v "SMTP_PASSWORD"; then
    echo "❌ FAIL: Found potential hardcoded passwords"
    ISSUES=$((ISSUES + 1))
else
    echo "✅ PASS: No hardcoded passwords found"
fi
echo ""

echo "[5/6] Checking for email addresses in documentation..."
if grep -r "@gmail\|@yahoo\|@hotmail" --include="*.md" . 2>/dev/null | grep -v "example.com"; then
    echo "⚠️  WARNING: Found potential personal email addresses in documentation"
else
    echo "✅ PASS: No personal email addresses in documentation"
fi
echo ""

echo "[6/6] Verifying .gitignore exists..."
if [ -f ".gitignore" ]; then
    echo "✅ PASS: .gitignore file exists"
    if grep -q ".env" .gitignore && grep -q "vendor/" .gitignore; then
        echo "✅ PASS: .gitignore contains .env and vendor/"
    else
        echo "❌ FAIL: .gitignore missing critical entries"
        ISSUES=$((ISSUES + 1))
    fi
else
    echo "❌ FAIL: .gitignore file not found"
    ISSUES=$((ISSUES + 1))
fi
echo ""

echo "======================================"
if [ $ISSUES -eq 0 ]; then
    echo "✅ All checks passed! Repository is ready for public publishing."
    exit 0
else
    echo "❌ Found $ISSUES critical issue(s). Please fix before publishing."
    exit 1
fi
