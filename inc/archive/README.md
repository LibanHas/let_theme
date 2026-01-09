# LET Theme – Archived Maintenance Scripts

This folder contains **one-off and maintenance scripts** that were used
during the development and evolution of the LET website.

These scripts were written to:
- migrate legacy data
- backfill newly introduced ACF fields
- repair inconsistencies caused by schema changes
- clean up historical content

They are **NOT part of normal site operation**.

---

## 🚫 Important: These files are NOT auto-loaded

Nothing in this folder is included by the theme.
No hooks run automatically.
No admin UI is registered.

Each script must be **explicitly reviewed and run manually** if ever needed again.

This is intentional.

---

## 📂 What lives here

Typical examples:
- Field migration scripts (old meta → new ACF fields)
- One-time language backfills
- Bulk date synchronization
- Title-based categorization fixes
- Legacy content migrations (e.g. ACF → block editor)

These scripts encode **historical decisions**, not current rules.

---

## 🧠 Why keep these scripts?

Although they are no longer needed day-to-day, they are valuable as:

- **Reference**: how similar problems were solved in the past
- **Precedent**: what assumptions were made (e.g. default language)
- **Templates**: safe starting points for future migrations

Deleting them would lose institutional memory.
Keeping them in runtime code would add risk.

This folder is the compromise.

---

## ▶️ How to run a script (if ever required)

1. **Read the header comment** at the top of the script  
   (purpose, assumptions, risks)

2. Temporarily enable execution by defining:

   ```php
   define('LET_RUN_MIGRATION', true);
