# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [0.2.0] - 2026-02-14

### Fixed
- PHP 8.3 compatibility issues including undefined array keys, undefined variables, and array offset warnings across various theme files.
- Safe `count()` usage by adding `is_countable()` checks in several components and sections.
- Delayed ACF options page registration to the `init` hook to prevent early translation loading notices.
- Robustness improvements in `cl_change_term_request` and breadcrumb logic.

## [0.1.0] - 2026-02-14

### Added
- Initial project setup using TailPress boilerplate.
- Tailwind CSS integration and configuration.
- ACF Pro integration with Flexible Content for page building.
- Asset pipeline with esbuild and PostCSS.
- Project documentation (`README.MD` and `GEMINI.md`).
- Git repository initialization and initial commit.